CREATE TABLE users (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    username varchar(50) NOT NULL,
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    email varchar(255) NOT NULL,
    user_password varchar(255) NOT NULL,
    birthdate date NOT NULL,
    picture_url varchar(255) NOT NULL DEFAULT 'user-default.svg',
    role_id int UNSIGNED NOT NULL DEFAULT '1',
    is_visible tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
    ban_end datetime DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY role_id REFERENCES roles(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE forums (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    content text NOT NULL,
    is_visible tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
    date datetime DEFAULT NULL,
    id_users int UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY id_users REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE respond (
    id int UNSIGNED NOT NULL,
    id_users int UNSIGNED NOT NULL,
    content text NOT NULL,
    is_visible tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
    date datetime DEFAULT NULL,
    CONSTRAINT UNIQUE pk_respond (id, id_users)
)

