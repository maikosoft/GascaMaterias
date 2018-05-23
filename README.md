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

<h2>Tablas Postgresql:</h2>
<pre>
CREATE TABLE public."user"
(
    id_user SERIAL NOT NULL PRIMARY KEY,
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    email character varying(50) COLLATE pg_catalog."default" NOT NULL,
    password character varying(50) COLLATE pg_catalog."default" NOT NULL,
    profile integer NOT NULL
);

CREATE TABLE public.subject
(
    id_subject SERIAL NOT NULL PRIMARY KEY,
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    reticle character varying(50) COLLATE pg_catalog."default",
    teacher_name character varying(50) COLLATE pg_catalog."default",
    hour_start time without time zone,
    hour_end time without time zone,
    max_students integer,
    status boolean
);

INSERT INTO public."user"(
	name, email, password, profile)
	VALUES ('Profesor Gasca', 'profe@gasca.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);
</pre>

