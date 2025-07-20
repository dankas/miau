        <h2>Consultas cadastradas: </h2>
        <table border="1" cellpadding="8" cellspacing="0" style="background:#fff; border-collapse:collapse; width:100%;">
            <thead>
                <tr>
                    <th>Pet</th>
                    <th>Veterinario</th>
                    <th>Imagem Receita</th>
                    <th>Data da consulta</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                                                    <form method="POST" action="home.php?action=addpet">
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
                                                                    <input type="text" name="img-perfil" id="img-perfil" value="">
                                                            </td>
                                                            <td> 
                                                                    <textarea name="bio" id="bio" required rows="5" cols="30"></textarea>        </td>
                                                            <td> 
                                                                    <button type="submit">Adicionar</button>
                                                            </td>
                                                    </form>
                                            </tr> -->

                <?php var_dump($consultas); ?>
                <?php listConsultas($consultas); ?>
            </tbody>
        </table>
