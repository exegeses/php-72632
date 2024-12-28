# creación de tablas usuarios y roles
create table roles
(
    idRol tinyint unsigned auto_increment primary key not null,
    rol varchar(45) unique not null
);

insert into roles
    values
            ( default, 'Administrador' ),
            ( default, 'Supervisor' ),
            ( default, 'Usuario' ),
            ( default, 'invitado' );

create table usuarios
(
    idUsuario tinyint unsigned auto_increment primary key not null,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    email varchar(50) unique not null,
    clave varchar(76) not null,
    idRol tinyint unsigned not null,
    foreign key (idRol) references roles (idRol),
    activo boolean not null
);