
###################
Reto Inteliti
###################

Este aplicativo permite crear usuarios para que estos puedan ingresar al sistema y registrar los datos de una historia
médica de un paciente generando una breve recomendación de salud

*******************
Tecnologías
*******************
- Codeigneter v.3 (php),
- JavaScript (jquery v1.9.1)

**************************
Requisitos de Instalación 
**************************
- Servidor con PHP version 5.6 or superior.
- Gestor de base de datos MySQL


**************************
Instalación 
**************************
- Crear una base de datos con MySQL e importar el sql provisto
- Clonar el repositorio dentro de la carpeta principal del servidor
    ```
    git clone https://github.com/josueco123/testinteliti.git
    ```
- Configurar las credenciales de la base de datos se debe crear un archivo llamado credentials_bd.php, dentro de la carpeta application/config 
y llenar las variables con sus valores correspondientes como se muestra en el ejemplo:

    ```
    <?php

    $db_host = "your db host";

    $db_username = "your db username";

    $db_password = "your db password";

    $db_database = "your db name";

    $db_driver = "mysqli";

    $db_port = "your db port"

    ?>
    ```

**************************
Contacto
**************************
- Author - Josue Hurtado
- LinkeedIn - [link](https://www.linkedin.com/in/josueco/)

