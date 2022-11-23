CREATE TABLE admin 
(
    id SERIAL PRIMARY KEY,
    name CHARACTER(255) NOT NULL, 
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_number CHAR(15) NOT NULL
)
;

CREATE TABLE users
(
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_number CHAR(15) NOT NULL
)
;

CREATE TABLE item
(
    id SERIAL PRIMARY KEY, 
    users_id SERIAL NOT NULL,
    name VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    item_desc VARCHAR(255) NOT NULL,
    CONSTRAINT item_users_id_fk FOREIGN KEY (users_id)
        REFERENCES users(id)
)
;

CREATE TABLE lost
(
    item_id SERIAL NOT NULL,
    admin_id SERIAL NOT NULL,
    date_lost DATE NOT NULL,
    location_lost VARCHAR(255) NOT NULL,
    time_lost TIMESTAMP NOT NULL,
    CONSTRAINT lost_item_id_fk FOREIGN KEY (item_id)
        REFERENCES item(id),
    CONSTRAINT lost_admin_id_fk FOREIGN KEY (admin_id)
        REFERENCES admin(id)
)
;

CREATE TABLE found
(
    item_id SERIAL NOT NULL,
    admin_id SERIAL NOT NULL,
    date_found DATE NOT NULL,
    location_found VARCHAR(255) NOT NULL,
    time_found TIMESTAMP NOT NULL,
    CONSTRAINT found_item_id_fk FOREIGN KEY (item_id)
        REFERENCES item(id),
    CONSTRAINT found_admin_id_fk FOREIGN KEY (admin_id)
        REFERENCES admin(id)
)
;

CREATE TABLE category
(
    id SERIAL NOT NULL,
    admin_id SERIAL NOT NULL,
    item_id SERIAL NOT NULL,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    color VARCHAR(255) NOT NULL, 
    CONSTRAINT category_admin_id_fk FOREIGN KEY (admin_id)
        REFERENCES admin(id), 
    CONSTRAINT category_item_id_fk FOREIGN KEY (item_id)
        REFERENCES item(id)
)
;