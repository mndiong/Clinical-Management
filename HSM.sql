

create table patient (
    ssn char(10) not null,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    address varchar(50) null,
    phone varchar(50) null,
    insuranceid int null,
    primary key(ssn)
);

create table medication (
    code varchar(50) not null,
    name varchar(50) not null,
    brand varchar(50) null,
    description varchar(100) null,
    primary key(code)
);

create table physician(
    physid int not null,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    position varchar(50) not null,
    ssn char(10) not null,
    primary key(physid)
);

create table nurse (
    nurseid int not null,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    position varchar(50) not null,
    registered boolean not null,
    ssn char(10) not null,
    primary key(nurseid)
);

create table department (
    dapartmentid int not null,
    name varchar(50) not null,
    head int not null,
    primary key(departmentid)
);

create table procedures (
    code int not null,
    name varchar(50) not null,
    cost real not null,
    primary key(code)
);

create table appointment (
    appointmentid int not null,
    patient ssn not null,
    prepnurse int not null,
    physician int not null,
    appdate datetime not null,
    primary key(appointmentid),
    foreign KEY(patient) references patient(patientid),
    foreign key(prepnurse) references nurse(nurseid),
    foreign key(physician) references physician(physid)
);

create table room (
    roomnumber int not null,
    roomtype varchar(50) not null,
    blockfloor int not null,
    blockcode int not null,
    unavailable boolean not null,
    primary key(roomnumber)
);

create table stay (
    stayid int not null,
    patient int not null,
    room int not null,
    start_time timestamp not null
    end_time timestamp not null,
    primary key(stayid)
);

create table bloodbank (
    bbankid int not null,
    address varchar(50) not null,
    primary key(bbankid)
);

create table phlebotomist (
    phlebotomistid int not null,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    ssn char(10) not null,
    primary key(phlebotomistid)
);

create table donation (
    bloodid int not null,
    donorid int not null,
    datetime timestamp not null,
    quantity int not null,
    primary key(bloodid)
);

create table donor (
    donorid int not null,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    address varchar(50) not null,
    email varchar(50) not null,
    phone varchar(50) not null,
    bloodtype varchar(50) not null,
    primary key(donorid)
);

create table recipient (
    recipientid int not null,
    name varchar(50) not null,
    address varchar(50) not null,
    email varchar(50) not null,
    phone varchar(50) not null,
    bloodtype varchar(50) not null,
    primary key(recipientid)
);

create table bloodTransaction (
    transactid int not null,
    phlebotomist int not null,
    quantity int not null,
    recipientid int not null,
    bloodtype varchar(3) not null,
    donorid int not null,
    primary key(transactid),
    foreign key(recipientid) references recipient (recipientid),
    foreign key(bloodid) references donor (donorid),
    foreign key(phlebotomist) references phlebotomist (phlebotomistid),
)

create table undergoes (
    patient int not null,
    procedure int not null,
    stay int not null,
    dayof timestamp not null,
    physician int not null,
    foreign key (patient) references patient(ssn),
    foreign key (procedure) references procedure(procedureid),
    foreign key (stay) references stay(stayid)
    foreign key (physician) references physician(physicianid)
);


create table prescribes (
    physician int not null,
    patient char(10) not null,
    medication int not null,
    dayof timestamp not null,
    appointment int not null,
    dose varchar(255) not null,
    foreign key (physician) references physician(physid),
    foreign key (patient) references patient(ssn),
    foreign key (medication) references medication(code),
    foreign key (appointment) references appointment(appointmentid)
);