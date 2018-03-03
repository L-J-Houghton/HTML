create table cl_preSignups
(
	id int not null auto_increment
		primary key,
	email varchar(255) not null,
	signupTime timestamp default CURRENT_TIMESTAMP not null,
	constraint cl_preSignups_id_uindex
		unique (id),
	constraint cl_preSignups_email_uindex
		unique (email)
)
;
