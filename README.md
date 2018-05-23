# GascaMaterias
<h1>Descripcion General:</h1>
<p>Test de PHP para trabajo de Desarrollador PHP en Gasca Tecnologías.</p> 

<h2>Funciones:</h2>
<ul>
    <li>Login de usuarios con perfil "Alumno" y "Maestro"</li>
    <li>Maestro
        <ul>
            <li>CRUD de usuarios</li>
            <li>CRUD de Materias</li>
        </ul>
    </li>
    <li>Postgresql server</li>
    <li>Driver postgresql de php</li>
</ul>

<p>La aplicacion </p>
<h2>Requerimientos del servidor:</h2>
<ul>
    <li>Apache o NGINX Server</li>
    <li>PHP: 7.0+</li>
    <li>Postgresql server</li>
    <li>Driver postgresql de php</li>
</ul>

<h2>Base de datos:</h2>
<p>
        -- Table: public."user"

        -- DROP TABLE public."user";
        
        CREATE TABLE public."user"
        (
            "IdUser" integer NOT NULL DEFAULT nextval('"user_IdUser_seq"'::regclass),
            "Name" character varying(50) COLLATE pg_catalog."default" NOT NULL,
            "Email" character varying(50) COLLATE pg_catalog."default" NOT NULL,
            "Password" character varying(50) COLLATE pg_catalog."default" NOT NULL,
            "Profile" integer NOT NULL,
            CONSTRAINT user_pkey PRIMARY KEY ("IdUser")
        )
        WITH (
            OIDS = FALSE
        )
        TABLESPACE pg_default;
        
        ALTER TABLE public."user"
            OWNER to postgres;
</p>

