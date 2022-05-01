

/*
add blood bank, its staff details, operating hours,
 and address. 

*/

create table patient (
    ssn char(10) not null,
    name varchar(50) not null,
    address varchar(50) null,
    phone varchar(50) null,
    insuranceid int null
)

create table medication (
    code varchar(50) not null,
    name varchar(50) not null,
    brand varchar(50) null,
    description varchar(100) null
)

create table physician(
    employeeid int not null,
    name varchar(50) not null,
    position varchar(50) not null,
    ssn char(10) not null
)

create table nurse (
    employeeid int not null,
    name varchar(50) not null,
    position varchar(50) not null,
    registered boolean not null,
    ssn char(10) not null
)

create table department (
    dapartmentid int not null,
    name varchar(50) not null,
    head int not null
)

create table procedure (
    code int not null,
    name varchar(50) not null,
    cost real not null
)

create table appointment (
    appointmentid int not null,
    patient int not null,
    prepnurse int not null,
    physician int not null,
    appdate datetime not null,
    examroom varchar(50) not null
)

create table room (
    roomnumber int not null,
    roomtype varchar(50) not null,
    blockfloor int not null,
    blockcode int not null,
    unavailable boolean not null
)

create table stay (
    stayid int not null,
    patient int not null,
    room int not null,
    start_time timestamp not null
    end_time timestamp not null
)

create table bloodbank (
    bbankid int not null,
    address varchar(50) not null,
    
)

create table phlebotomist (
    pid int not null,
    name varchar(50) not null,
    ssn char(10) not null
)

