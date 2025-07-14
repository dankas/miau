document.addEventListener('DOMContentLoaded', () => {
    const petNav = document.getElementById('pet-nav');
    const mainContent = document.getElementById('main-content');

    // Function to fetch pet data
    async function fetchPets() {
        try {
            const response = await fetch('export/pets.json');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return await response.json();
        } catch (error) {
            console.error('Error fetching pet data:', error);
            mainContent.innerHTML = '<p>Failed to load pet information. Please try again later.</p>';
            return [];
        }
    }

    // Function to render navigation links
    function renderNavigation(pets) {
        petNav.innerHTML = ''; // Clear existing nav
        const ul = document.createElement('ul');
        pets.forEach(pet => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = `#${pet.nome.toLowerCase()}`;

            
            const img = document.createElement('img');
            img.src = 'assets/imgs/uploads/' + pet.imgperfil; 
            img.alt = pet.nome;
            img.className = 'pet-navimg';

            a.appendChild(img);

            a.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default anchor behavior
                displayPetInfo(pet);
            });
            li.appendChild(a);
            ul.appendChild(li);
        });
        petNav.appendChild(ul);
    }

    // Function to display pet information
    function displayPetInfo(pet) {
        mainContent.innerHTML = `
            <h2>${pet.nome}</h2>
            <p><strong>Raça:</strong> ${pet.race}</p>
            <p><strong>Idade:</strong> ${new Date().getFullYear() - new Date(pet.nascimento).getFullYear()} anos</p>
            <p><strong>Aniversário:</strong> ${pet.nascimento}</p>
            <p><strong>Tipo:</strong> ${pet.tipo}</p>

            <p>${pet.bio}</p>
        `;
    }

    // Initialize the application
    fetchPets().then(pets => {
        renderNavigation(pets);
        
    });

});


