<?php
$file_path = 'BD.db';

$mybd = new SQLite3($file_path);

$table_jogos = "CREATE TABLE IF NOT EXISTS `Jogos` ( `CodJogos` INTEGER, `Nome` TEXT NOT NULL, `Genero` TEXT NOT NULL )";
$table_plataforma = "CREATE TABLE IF NOT EXISTS `Plataforma` ( `CodPlataforma` INTEGER, `Nome` TEXT, PRIMARY KEY(`CodPlataforma`) )";
$table_usuario = "CREATE TABLE IF NOT EXISTS `Usuario` ( `CodUsuario` INTEGER, `Nick` TEXT NOT NULL, `Senha` TEXT NOT NULL, PRIMARY KEY(`CodUsuario`) )";
$table_p_j = "CREATE TABLE IF NOT EXISTS `P_J` ( `CodPlataforma` INTEGER, `Cod_Jogos` INTEGER, PRIMARY KEY(`CodPlataforma`,`Cod_Jogos`), FOREIGN KEY(`CodPlataforma`) REFERENCES `Plataforma`(`CodPlataforma`), FOREIGN KEY(`Cod_Jogos`) REFERENCES `Jogos`(`CodJogos`) )";
$table_u_p_j = "CREATE TABLE IF NOT EXISTS `U_P_J` ( `CodUsuario` INTEGER, `CodJogo` INTEGER, `CodPlataforma` INTEGER, FOREIGN KEY(`CodPlataforma`) REFERENCES `P_J`(`CodPlataforma`), FOREIGN KEY(`CodJogo`) REFERENCES `P_J`(`Cod_Jogos`), PRIMARY KEY(`CodUsuario`,`CodJogo`,`CodPlataforma`), FOREIGN KEY(`CodUsuario`) REFERENCES `Usuario`(`CodUsuario`) )";

$mybd->exec($table_jogos);
$mybd->exec($table_plataforma);
$mybd->exec($table_usuario);
$mybd->exec($table_p_j);
$mybd->exec($table_u_p_j);

$plat_steam = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'STEAM') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'STEAM') LIMIT 1";
$plat_origin = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'ORIGIN') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'ORIGIN') LIMIT 1";
$plat_xbox = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'XBOX LIVE') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'XBOX LIVE') LIMIT 1";
$plat_playstation = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'PLAYSTATION NETWORK') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'PLAYSTATION NETWORK') LIMIT 1";
$plat_nuuvem = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'NUUVEM') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'NUUVEM') LIMIT 1";
$plat_gog = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'GOG') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'GOG') LIMIT 1";
$plat_battle = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'BATTLE.NET') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'BATTLE.NET') LIMIT 1";
$plat_nintendo = "INSERT INTO Plataforma (Nome) SELECT * FROM (SELECT 'NINTENDO') AS tmp WHERE NOT EXISTS (SELECT Nome FROM Plataforma WHERE Nome = 'NINTENDO') LIMIT 1";

$mybd->exec($plat_steam);
$mybd->exec($plat_origin);
$mybd->exec($plat_xbox);
$mybd->exec($plat_playstation);
$mybd->exec($plat_nuuvem);
$mybd->exec($plat_gog);
$mybd->exec($plat_battle);
$mybd->exec($plat_nintendo);
