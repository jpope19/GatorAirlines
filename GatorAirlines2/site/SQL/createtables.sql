CREATE table if not exists customers 
(
	cid int auto_increment primary key,
	email varchar(30) not null,
	first_name varchar(30),
	last_name varchar(30),
	password varchar(30),
	addr varchar(30),
	city varchar(30),
	state varchar(30),
	zip varchar(30),
	cc_num int(16),
	u_type int(2)    
);
        
CREATE table if not exists airports 
(
	airport_id int auto_increment primary key,
	city varchar(40),
	state varchar(2),
	iata varchar(3),
	name varchar(65)  
);

CREATE table if not exists airplanes 
(
	plane_id int auto_increment primary key,
	type varchar(40),
	chart_addr varchar(50),
	num_first_class int(3),
	num_coach_class int(3)  
);
        
CREATE table if not exists flights 
(
	flight_id int auto_increment primary key,
	plane_id int,
	org_id int,
	dest_id int,
	first_class_cost int(4),
	coach_class_cost int(4),
	e_depart_time varchar(30),
	e_arrival_time varchar(30),
	depart_time varchar(30),
	arrival_time varchar(30),
	distance int(5)
);

CREATE table if not exists tickets 
(
		ticket_id int auto_increment primary key,
		cid int,
		flight_id int,
		seat_id int,
		price int(4)  
);

CREATE table if not exists vip 
(
	vip_id int auto_increment primary key,
	cid int,
	travel_distance int,
	points_left int  
);