CREATE TABLE user (
	u_id INTEGER PRIMARY KEY,
	u_user CHAR(100) NOT NULL UNIQUE,
	u_password CHAR(100) NOT NULL
);

CREATE TABLE cms (
	c_id INTEGER PRIMARY KEY,
	c_query VARCHAR(255) NOT NULL DEFAULT '',
	c_meta TEXT NOT NULL DEFAULT '',
	c_title VARCHAR(255) NOT NULL DEFAULT '',
	c_subject VARCHAR(255) NOT NULL DEFAULT '',
	c_content TEXT NOT NULL DEFAULT '',
	c_posted VARCHAR(255) NOT NULL DEFAULT 'NOW()',
	c_u_id INTEGER NOT NULL
);
# 'u_user' is username 'u_password' is password
# the password should be sha1 encrypted
# the default password is 'admin'
INSERT INTO user (u_user,u_password) VALUES('admin','d033e22ae348aeb5660fc2140aec35850c4da997');