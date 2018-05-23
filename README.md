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
<p>
CREATE TABLE public."user"
(
    id_user integer NOT NULL DEFAULT nextval('user_id_user_seq'::regclass),
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    email character varying(50) COLLATE pg_catalog."default" NOT NULL,
    password character varying(50) COLLATE pg_catalog."default" NOT NULL,
    profile integer NOT NULL,
    CONSTRAINT user_pkey PRIMARY KEY (id_user)
)

CREATE TABLE public.subject
(
    id_subject integer NOT NULL DEFAULT nextval('subject_id_subject_seq'::regclass),
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    reticle character varying(50) COLLATE pg_catalog."default",
    teacher_name character varying(50) COLLATE pg_catalog."default",
    hour_start time without time zone,
    hour_end time without time zone,
    max_students integer,
    status boolean,
    CONSTRAINT subject_pkey PRIMARY KEY (id_subject)
)
</p>

