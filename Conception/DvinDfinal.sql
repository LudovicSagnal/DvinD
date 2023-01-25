create table utilisateur(
id_utilisateur int primary key auto_increment not null,
nom_utilisateur varchar(50) not null,
prenom_utilisateur varchar(50) not null,
mail_utilisateur varchar(50) not null,
pseudo_utilisateur varchar(50) not null,
password_utilisateur varchar(100) not null,
url_utilisateur varchar(100) not null,
naissance_utilisateur date not null,
statut_utilisateur tinyint(1) default 0,
fin_ban_utilisateur datetime,
id_role int not null
)Engine=InnoDB;

create table role(
id_role int primary key auto_increment not null,
nom_role varchar(50)
)Engine=InnoDB;

create table jeux(
id_jeux int primary key auto_increment not null,
nom_jeux varchar(50) not null,
desc_jeux text not null,
sortie_jeux varchar(50) not null
)Engine=InnoDB;

create table asset(
id_asset int primary key auto_increment not null,
url_asset varchar(50) not null,
id_type_asset int not null
)Engine=InnoDB;

create table type_asset(
id_type_asset int primary key auto_increment not null,
nom_type_asset varchar(50) not null
)Engine=InnoDB;

create table tag(
id_tag int primary key auto_increment not null,
nom_tag varchar(50)
)Engine=InnoDB;

create table actualite(
id_actualite int primary key auto_increment not null,
titre_actualite varchar(100) not null,
contenu_actualite text not null,
date_actualite datetime not null,
statut_actualite tinyint(1) default 0,
id_utilisateur int not null,
id_jeux int
)Engine=InnoDB;

create table messagerie(
id_messagerie int primary key auto_increment not null,
contenu_messagerie text not null,
date_messagerie datetime not null
)Engine=innoDB;

create table post_forum(
id_post_forum int primary key auto_increment not null,
titre_post_forum varchar(50) not null,
contenu_post_forum text not null,
date_post_forum datetime not null,
statut_post_forum tinyint(1) default 0,
id_utilisateur int not null
)Engine=InnoDB;

create table avoir(
id_tag int not null,
id_jeux int not null,
primary key(id_tag, id_jeux)
)Engine=InnoDB;

alter table avoir
add constraint fk_avoir_tag
foreign key(id_tag)
references tag(id_tag);

alter table avoir
add constraint fk_avoir_jeux
foreign key(id_jeux)
references jeux(id_jeux);

create table attribuer(
id_asset int not null,
id_jeux int not null,
primary key(id_asset, id_jeux)
)Engine=InnoDb;

alter table attribuer
add constraint fk_attribuer_asset
foreign key(id_asset)
references asset(id_asset);

alter table attribuer
add constraint fk_attribuer_jeux
foreign key(id_jeux)
references jeux(id_jeux);

create table commenter(
id_actualite int not null,
id_utilisateur int not null,
contenu_commentaire tinytext not null,
date_commentaire datetime
)Engine=innoDB;

alter table commenter add primary key (id_actualite, id_utilisateur);

alter table commenter
add constraint fk_commenter_actualite
foreign key(id_actualite)
references actualite(id_actualite);

alter table commenter
add constraint fk_commenter_utilisateur
foreign key(id_utilisateur)
references utilisateur(id_utilisateur);

create table contacter(
id_utilisateur int not null,
id_messagerie int not null,
id_utilisateur_contacter int not null,
primary key(id_utilisateur, id_messagerie, id_utilisateur_contacter)
)Engine=innoDB;

alter table contacter
add constraint fk_contacter_utilisateur
foreign key(id_utilisateur)
references utilisateur(id_utilisateur);

alter table contacter
add constraint fk_contacter_messagerie
foreign key(id_messagerie)
references messagerie(id_messagerie);

alter table contacter
add constraint fk_contacter_utilisateur_contacter
foreign key(id_utilisateur_contacter)
references utilisateur(id_utilisateur);

create table repondre(
id_post_forum int not null,
id_utilisateur int not null,
contenu_repondre tinytext not null,
date_repondre datetime not null,
statut_repondre tinyint(1) default 0,
primary key(id_post_forum, id_utilisateur)
)Engine=innoDB;

alter table repondre
add constraint fk_repondre_post_forum
foreign key(id_post_forum)
references post_forum(id_post_forum);

alter table repondre
add constraint fk_repondre_utilisateur
foreign key(id_utilisateur)
references utilisateur(id_utilisateur);

alter table actualite
add constraint fk_publier_utilisateur
foreign key(id_utilisateur)
references utilisateur(id_utilisateur);

alter table actualite
add constraint fk_contenir_jeux
foreign key(id_jeux)
references jeux(id_jeux);

alter table asset
add constraint fk_allouer_type_asset
foreign key(id_type_asset)
references type_asset(id_type_asset);

alter table post_forum
add constraint fk_poster_utilisateur
foreign key(id_utilisateur)
references utilisateur(id_utilisateur);

alter table utilisateur
add constraint fk_posseder_role
foreign key(id_role)
references role(id_role);

alter table asset modify column url_asset varchar(100);

alter table post_forum modify column titre_post_forum varchar(100);