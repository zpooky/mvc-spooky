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

INSERT INTO user (u_user,u_password) VALUES('spooky','36814d00b03a1082720656ea75e6be382b5aac12');
INSERT INTO user (u_user,u_password) VALUES('booky','36814d00b03a1082720656ea75e6be382b5aac12');
INSERT INTO user (u_user,u_password) VALUES('looky','36814d00b03a1082720656ea75e6be382b5aac12');
INSERT INTO user (u_user,u_password) VALUES('tooky','36814d00b03a1082720656ea75e6be382b5aac12');
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query1','c_title','c_subject1','c_content','c_posted',1);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query2','c_title','c_subject2','c_content','c_posted',2);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query3','c_title','c_subject3','c_content','c_posted',3);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query4','c_title','c_subject4','c_content','c_posted',4);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query5','c_title','c_subject5','c_content','c_posted',1);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query6','c_title','c_subject6','c_content','c_posted',2);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query7','c_title','c_subject7','c_content','c_posted',3);
INSERT INTO cms (c_query,c_title,c_subject,c_content,c_posted,c_u_id) VALUES('c_query8','c_title','c_subject8','c_content','c_posted',4);

UPDATE cms SET c_content = 'It was time to find out a bit more about Air Buccaneers HD So it was that we spoke to Ludocraft CEO Tony Manninen and asked him what they were up to That investigation commences belowRPS Can you tell us a bit about Ludocraft who are you guys and how did you come to be making mods and gamesManninen LudoCraft is a game studio located in Oulu Finland At the moment there is a strong team working and playing in the studio The total darkness of winter seasons and the total brightness of our short summers make us a bit crazy Perhaps thats the perfect recipe for game development We develop various types of games both for entertainment sector and for utilitarian purposes This year weve shipped two iOSAndroid titles RoboFonics and AstroComet but AirBuccaneers is our main project at the momentThe origin of LudoCraft goes back in time for more than ten years We started as a games research unit operating inside the chambers of university Since we always loved developing games instead of just studying them we got into the habit of making all sorts of games Many of them were weird and nonconventional prototypes for research purposes At that time we challenged ourselves with various international game development competitions such as Make Something Unreal and Independent Games Festival I suppose that was our way of benchmarking our skills as game developers This is how the original AirBuccaneers was created and we were really happy to receive excellent feedback for itRPS Whats the story behind Air Buccaneers itself Can you tell us a bit about the creation of the original modManninen AirBuccaneers originated as a spinoff from another game project eScape we were working on back in At that time we decided to take part into Make Something Unreal Competition but unfortunately we did not have any suitable designs for the competition The first idea we got was to have airships equipped with cannons and then have two teams blasting each other to pieces This idea immediately spawned the vision of having these majestic airships gliding gracefully through the skies with their cannons roaring and crews sweating during the heat of the battleWe expected relatively quiet reaction from the player community because AirBuccaneers was not a mainstream game concept Although it was somewhat related to the FPS genre the gameplay and the whole theme was so different that we thought it might be difficult for players to adopt However the game was interestingly different it had very strong team game aspect and it offered huge scope for learning while the entry level was smooth and easyAs it turned out AirBuccaneers gathered a group of highly enthusiastic fans who enjoyed this type of more mature gameplay Some people have been playing the mod for years and it seems there still are LAN parties around the world where people play the original mod We have been eagerly following the discussion around AirBuccaneers and waited for the right moment to revive the concept Since we were a university team at the time of the mod we did not have much chance in pursuing the further development of the game Now things are different';
