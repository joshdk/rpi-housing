
CREATE TABLE admins
(
  username character varying(30),
  first_name character varying(30),
  last_name character varying(30),
  email character varying(30),
  password character varying(30),
  last_login date,
  date_created date,
  PRIMARY KEY (username)
);

CREATE TABLE buildings
(
  building_id serial NOT NULL,
  name text,
  location text,
  description text,
  CONSTRAINT buildings_pkey PRIMARY KEY (building_id ),
  CONSTRAINT buildings_name_key UNIQUE (name )
);

CREATE TABLE rooms
(
  room_id serial NOT NULL,
  "number" character varying(20),
  building_id integer NOT NULL,
  totalpeople integer,
  currentpeople integer DEFAULT 0,
  squarefeet integer,
  gender boolean,
  CONSTRAINT rooms_pkey PRIMARY KEY (id),
  CONSTRAINT rooms_id_key UNIQUE (id )
);

CREATE TABLE users
(
  user_id serial NOT NULL,
  room_id integer NOT NULL,
  rcsid varchar(20) NOT NULL,
  gender boolean,
  CONSTRAINT users_pkey PRIMARY KEY (user_id ),
  CONSTRAINT users_rin_key UNIQUE (rcsid )
);

