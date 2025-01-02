/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     08.12.2024 17:45:12                          */
/*==============================================================*/


alter table SS_AT_ADM_USERS 
   drop foreign key FK_SS_AT_AD_REFERENCE_SS_AT_AD;

alter table SS_AT_ADM_USERS 
   drop foreign key FK_SS_AT_AD_REFERENCE_SS_SPR_C;

alter table SS_EQ 
   drop foreign key FK_SS_EQ_REFERENCE_SS_TYPE_;

alter table SS_INVENTORY 
   drop foreign key FK_SS_INVEN_REFERENCE_SS_SPR_C;

alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_INVEN;

alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_EQ;

alter table SS_PLACE_EQ_CON 
   drop foreign key FK_SS_PLACE_REFERENCE_SS_EQ;

alter table SS_PLACE_EQ_CON 
   drop foreign key FK_SS_PLACE_REFERENCE_SS_SPR_P;

alter table SS_PROJECTS 
   drop foreign key FK_SS_PROJE_REFERENCE_SS_SPR_P;

alter table SS_PROJECTS_EQ_CON 
   drop foreign key FK_SS_PROJE_REFERENCE_SS_EQ;

alter table SS_PROJECTS_EQ_CON 
   drop foreign key FK_SS_PROJE_REFERENCE_SS_PROJE;

alter table SS_SPR_PLACE 
   drop foreign key FK_SS_SPR_P_REFERENCE_SS_SPR_C;

drop index NAME_ROLE_IDX on SS_AT_ADM_ROLES;

drop table if exists SS_AT_ADM_ROLES;

drop index USER_LASTNAME_IDX on SS_AT_ADM_USERS;

drop index USER_FIRSTNAME_IDX on SS_AT_ADM_USERS;

drop index NAME_USER_IDX on SS_AT_ADM_USERS;


alter table SS_AT_ADM_USERS 
   drop foreign key FK_SS_AT_AD_REFERENCE_SS_SPR_C;

alter table SS_AT_ADM_USERS 
   drop foreign key FK_SS_AT_AD_REFERENCE_SS_AT_AD;

drop table if exists SS_AT_ADM_USERS;

drop index NAME_EQ_IDX on SS_EQ;


alter table SS_EQ 
   drop foreign key FK_SS_EQ_REFERENCE_SS_TYPE_;

drop table if exists SS_EQ;

drop index DATE_INVENTORY_IDX on SS_INVENTORY;


alter table SS_INVENTORY 
   drop foreign key FK_SS_INVEN_REFERENCE_SS_SPR_C;

drop table if exists SS_INVENTORY;


alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_INVEN;

alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_EQ;

drop table if exists SS_INV_EQ_CON;


alter table SS_PLACE_EQ_CON 
   drop foreign key FK_SS_PLACE_REFERENCE_SS_EQ;

alter table SS_PLACE_EQ_CON 
   drop foreign key FK_SS_PLACE_REFERENCE_SS_SPR_P;

drop table if exists SS_PLACE_EQ_CON;

drop index ORD_DATE_IDX on SS_PROJECTS;

drop index NAME_PROJECT_IDX on SS_PROJECTS;


alter table SS_PROJECTS 
   drop foreign key FK_SS_PROJE_REFERENCE_SS_SPR_P;

drop table if exists SS_PROJECTS;


alter table SS_PROJECTS_EQ_CON 
   drop foreign key FK_SS_PROJE_REFERENCE_SS_EQ;

alter table SS_PROJECTS_EQ_CON 
   drop foreign key FK_SS_PROJE_REFERENCE_SS_PROJE;

drop table if exists SS_PROJECTS_EQ_CON;

drop index NAME_CITY_IDX on SS_SPR_CITY;

drop table if exists SS_SPR_CITY;

drop index NAME_PLACE_IDX on SS_SPR_PLACE;


alter table SS_SPR_PLACE 
   drop foreign key FK_SS_SPR_P_REFERENCE_SS_SPR_C;

drop table if exists SS_SPR_PLACE;

drop index NAME_TYPE_IDX on SS_TYPE_EQ;

drop table if exists SS_TYPE_EQ;

/*==============================================================*/
/* Table: SS_AT_ADM_ROLES                                       */
/*==============================================================*/
create table SS_AT_ADM_ROLES
(
   ID_ROLE              int not null AUTO_INCREMENT,
   NAME_ROLE            varchar(255),
   primary key (ID_ROLE)
);

/*==============================================================*/
/* Index: NAME_ROLE_IDX                                         */
/*==============================================================*/
create unique index NAME_ROLE_IDX on SS_AT_ADM_ROLES
(
   NAME_ROLE
);

/*==============================================================*/
/* Table: SS_AT_ADM_USERS                                       */
/*==============================================================*/
create table SS_AT_ADM_USERS
(
   ID_USER              int not null AUTO_INCREMENT,
   ID_CITY              int,
   ID_ROLE              int,
   NAME_USER            varchar(20) not null,
   USER_FIRSTNAME       varchar(60) not null,
   USER_LASTNAME        varchar(20),
   PWD_USER             varchar(255) not null,
   USER_CIF             varchar(50) not null,
   USER_IV              varchar(100) not null,
   USER_KEY             varchar(100) not null,
   primary key (ID_USER)
);

/*==============================================================*/
/* Index: NAME_USER_IDX                                         */
/*==============================================================*/
create unique index NAME_USER_IDX on SS_AT_ADM_USERS
(
   NAME_USER
);

/*==============================================================*/
/* Index: USER_FIRSTNAME_IDX                                    */
/*==============================================================*/
create index USER_FIRSTNAME_IDX on SS_AT_ADM_USERS
(
   USER_FIRSTNAME
);

/*==============================================================*/
/* Index: USER_LASTNAME_IDX                                     */
/*==============================================================*/
create index USER_LASTNAME_IDX on SS_AT_ADM_USERS
(
   USER_LASTNAME
);

/*==============================================================*/
/* Table: SS_EQ                                                 */
/*==============================================================*/
create table SS_EQ
(
   ID_EQ                int not null AUTO_INCREMENT,
   ID_TYPE              int,
   NAME_EQ              varchar(255),
   EQ_UNITS             varchar(6),
   primary key (ID_EQ)
);

/*==============================================================*/
/* Index: NAME_EQ_IDX                                           */
/*==============================================================*/
create index NAME_EQ_IDX on SS_EQ
(
   NAME_EQ
);

/*==============================================================*/
/* Table: SS_INVENTORY                                          */
/*==============================================================*/
create table SS_INVENTORY
(
   ID_INVENTORY         int not null AUTO_INCREMENT,
   ID_CITY              int,
   DATE_INVENTORY       date,
   FLAG_SAVING          boolean not null,
   primary key (ID_INVENTORY)
);

/*==============================================================*/
/* Index: DATE_INVENTORY_IDX                                    */
/*==============================================================*/
create index DATE_INVENTORY_IDX on SS_INVENTORY
(
   DATE_INVENTORY
);

/*==============================================================*/
/* Table: SS_INV_EQ_CON                                         */
/*==============================================================*/
create table SS_INV_EQ_CON
(
   ID_INVENTORY         int,
   ID_EQ                int,
   EQ_QUANTITY          float
);

/*==============================================================*/
/* Table: SS_PLACE_EQ_CON                                       */
/*==============================================================*/
create table SS_PLACE_EQ_CON
(
   ID_EQ                int,
   ID_PLACE             int,
   EQ_QUANTITY          float
);

/*==============================================================*/
/* Table: SS_PROJECTS                                           */
/*==============================================================*/
create table SS_PROJECTS
(
   ID_PROJECT           int not null AUTO_INCREMENT,
   ID_PLACE             int,
   NAME_PROJECT         varchar(255),
   ORD_DATE             date,
   END_DATE             date,
   FLAG_ORD             char(1),
   primary key (ID_PROJECT)
);

/*==============================================================*/
/* Index: NAME_PROJECT_IDX                                      */
/*==============================================================*/
create index NAME_PROJECT_IDX on SS_PROJECTS
(
   NAME_PROJECT
);

/*==============================================================*/
/* Index: ORD_DATE_IDX                                          */
/*==============================================================*/
create index ORD_DATE_IDX on SS_PROJECTS
(
   ORD_DATE
);

/*==============================================================*/
/* Table: SS_PROJECTS_EQ_CON                                    */
/*==============================================================*/
create table SS_PROJECTS_EQ_CON
(
   ID_EQ                int,
   ID_PROJECT           int,
   EQ_QUANTITY          float
);

/*==============================================================*/
/* Table: SS_SPR_CITY                                           */
/*==============================================================*/
create table SS_SPR_CITY
(
   ID_CITY              int not null AUTO_INCREMENT,
   NAME_CITY            varchar(100) not null,
   primary key (ID_CITY)
);

/*==============================================================*/
/* Index: NAME_CITY_IDX                                         */
/*==============================================================*/
create unique index NAME_CITY_IDX on SS_SPR_CITY
(
   NAME_CITY
);

/*==============================================================*/
/* Table: SS_SPR_PLACE                                          */
/*==============================================================*/
create table SS_SPR_PLACE
(
   ID_PLACE             int not null AUTO_INCREMENT,
   ID_CITY              int,
   NAME_PLACE           varchar(255),
   primary key (ID_PLACE)
);

/*==============================================================*/
/* Index: NAME_PLACE_IDX                                        */
/*==============================================================*/
create index NAME_PLACE_IDX on SS_SPR_PLACE
(
   NAME_PLACE
);

/*==============================================================*/
/* Table: SS_TYPE_EQ                                            */
/*==============================================================*/
create table SS_TYPE_EQ
(
   ID_TYPE              int not null AUTO_INCREMENT,
   NAME_TYPE            varchar(255),
   primary key (ID_TYPE)
);

/*==============================================================*/
/* Index: NAME_TYPE_IDX                                         */
/*==============================================================*/
create unique index NAME_TYPE_IDX on SS_TYPE_EQ
(
   NAME_TYPE
);

alter table SS_AT_ADM_USERS add constraint FK_SS_AT_AD_REFERENCE_SS_AT_AD foreign key (ID_ROLE)
      references SS_AT_ADM_ROLES (ID_ROLE) on delete restrict on update restrict;

alter table SS_AT_ADM_USERS add constraint FK_SS_AT_AD_REFERENCE_SS_SPR_C foreign key (ID_CITY)
      references SS_SPR_CITY (ID_CITY) on delete restrict on update restrict;

alter table SS_EQ add constraint FK_SS_EQ_REFERENCE_SS_TYPE_ foreign key (ID_TYPE)
      references SS_TYPE_EQ (ID_TYPE) on delete restrict on update restrict;

alter table SS_INVENTORY add constraint FK_SS_INVEN_REFERENCE_SS_SPR_C foreign key (ID_CITY)
      references SS_SPR_CITY (ID_CITY) on delete restrict on update restrict;

alter table SS_INV_EQ_CON add constraint FK_SS_INV_E_REFERENCE_SS_INVEN foreign key (ID_INVENTORY)
      references SS_INVENTORY (ID_INVENTORY) on delete restrict on update restrict;

alter table SS_INV_EQ_CON add constraint FK_SS_INV_E_REFERENCE_SS_EQ foreign key (ID_EQ)
      references SS_EQ (ID_EQ) on delete restrict on update restrict;

alter table SS_PLACE_EQ_CON add constraint FK_SS_PLACE_REFERENCE_SS_EQ foreign key (ID_EQ)
      references SS_EQ (ID_EQ) on delete restrict on update restrict;

alter table SS_PLACE_EQ_CON add constraint FK_SS_PLACE_REFERENCE_SS_SPR_P foreign key (ID_PLACE)
      references SS_SPR_PLACE (ID_PLACE) on delete restrict on update restrict;

alter table SS_PROJECTS add constraint FK_SS_PROJE_REFERENCE_SS_SPR_P foreign key (ID_PLACE)
      references SS_SPR_PLACE (ID_PLACE) on delete restrict on update restrict;

alter table SS_PROJECTS_EQ_CON add constraint FK_SS_PROJE_REFERENCE_SS_EQ foreign key (ID_EQ)
      references SS_EQ (ID_EQ) on delete restrict on update restrict;

alter table SS_PROJECTS_EQ_CON add constraint FK_SS_PROJE_REFERENCE_SS_PROJE foreign key (ID_PROJECT)
      references SS_PROJECTS (ID_PROJECT) on delete restrict on update restrict;

alter table SS_SPR_PLACE add constraint FK_SS_SPR_P_REFERENCE_SS_SPR_C foreign key (ID_CITY)
      references SS_SPR_CITY (ID_CITY) on delete restrict on update restrict;

