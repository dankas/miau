const route = (event) => {
    event = event || window.event;
    event.preventDefault();
    window.history.pushState({}, "", event.target.href);
    handleLocation();
};

const routes = {
    404: "/partials/404.html",
    "/perfil": "/partials/perfil.html",
    "/consultas": "/partials/consultas.html",
    "/vacina": "/partials/vacina.html",
  
};

const handleLocation = async () => {
    const path = window.location.pathname;
    const route = routes[path] || routes[404];
    const html = await fetch(route).then((data) => data.text());
    document.getElementById("main-content").innerHTML = html;
};

window.onpopstate = handleLocation;
window.route = route;

handleLocation();