        <h2>Pets cadastrados: </h2>
        <table border="1" cellpadding="8" cellspacing="0" style="background:#fff; border-collapse:collapse; width:100%;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Raça</th>
                    <th>Data nascimento</th>
                    <th>Imagem de perfil</th>
                    <th>Bio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form method="POST" enctype='multipart/form-data' action="home.php?action=addpet">
                        <td>
                            <input type="text" name="nome" id="nome" required >
                        </td>
                        <td>
                            <select name="tipo" id="tipo" required>
                                <option value="">Selecione</option>
                                <option value="Cachorro">Cão</option>
                                <option value="Gato">Gato</option>
                                
                            </select>
                        </td>
                        <td>
                            <input type="text" name="race" id="race" required>
                        </td>
                        <td> 
                            <input type="date" name="nascimento" id="nascimento" required>
                        </td>
                        <td>
                        <input type='file' name='img_upload' accept='image/*'>
                         </td>
                        <td> 
                            <textarea name="bio" id="bio" required rows="5" cols="30"></textarea>        </td>
                        <td> 
                            <button type="submit">Adicionar</button>
                        </td>
                    </form>
                </tr>
                <?php listPets($pets); ?>
            </tbody>
        </table>
