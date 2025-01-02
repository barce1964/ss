/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     01.12.2024 15:57:25                          */
/*==============================================================*/


alter table SS_AT_ADM_USERS 
   drop foreign key FK_SS_AT_AD_REFERENCE_SS_AT_AD;

alter table SS_AT_ADM_USERS 
   drop foreign key FK_SS_AT_AD_REFERENCE_SS_SPR_C;

alter table SS_EQ 
   drop foreign key FK_SS_EQ_REFERENCE_SS_TYPE_;

alter table SS_EQ_QUANTITY 
   drop foreign key FK_SS_EQ_QU_REFERENCE_SS_ORDER;

alter table SS_EQ_QUANTITY 
   drop foreign key FK_SS_EQ_QU_REFERENCE_SS_EQ;

alter table SS_INVENTORY 
   drop foreign key FK_SS_INVEN_REFERENCE_SS_SPR_C;

alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_INVEN;

alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_EQ;

alter table SS_ORDER 
   drop foreign key FK_SS_ORDER_REFERENCE_SS_SPR_P;

alter table SS_ORDER 
   drop foreign key FK_SS_ORDER_REFERENCE_SS_SPR_C;

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


alter table SS_EQ_QUANTITY 
   drop foreign key FK_SS_EQ_QU_REFERENCE_SS_ORDER;

alter table SS_EQ_QUANTITY 
   drop foreign key FK_SS_EQ_QU_REFERENCE_SS_EQ;

drop table if exists SS_EQ_QUANTITY;

drop index DATE_INVENTORY_IDX on SS_INVENTORY;


alter table SS_INVENTORY 
   drop foreign key FK_SS_INVEN_REFERENCE_SS_SPR_C;

drop table if exists SS_INVENTORY;


alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_INVEN;

alter table SS_INV_EQ_CON 
   drop foreign key FK_SS_INV_E_REFERENCE_SS_EQ;

drop table if exists SS_INV_EQ_CON;

drop index ORD_DATE_IDX on SS_ORDER;


alter table SS_ORDER 
   drop foreign key FK_SS_ORDER_REFERENCE_SS_SPR_P;

alter table SS_ORDER 
   drop foreign key FK_SS_ORDER_REFERENCE_SS_SPR_C;

drop table if exists SS_ORDER;

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
   ID_ROLE              int not null  comment '',
   NAME_ROLE            varchar(255)  comment '',
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
   ID_USER              int not null  comment '',
   ID_CITY              int  comment '',
   ID_ROLE              int  comment '',
   NAME_USER            varchar(20) not null  comment '',
   USER_FIRSTNAME       varchar(60) not null  comment '',
   USER_LASTNAME        varchar(20)  comment '',
   PWD_USER             varchar(255) not null  comment '',
   USER_CIF             varchar(50) not null  comment '',
   USER_IV              varchar(100) not null  comment '',
   USER_KEY             varchar(100) not null  comment '',
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
   ID_EQ                int not null  comment '',
   ID_TYPE              int  comment '',
   NAME_EQ              varchar(255)  comment '',
   EQ_UNITS             varchar(6)  comment '',
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
/* Table: SS_EQ_QUANTITY                                        */
/*==============================================================*/
create table SS_EQ_QUANTITY
(
   ID_ORDER             int  comment '',
   ID_EQ                int  comment '',
   EQ_QUANTITY          float  comment '',
   EQ_PLACE_FLAG        char(1)  comment ''
);

/*==============================================================*/
/* Table: SS_INVENTORY                                          */
/*==============================================================*/
create table SS_INVENTORY
(
   ID_INVENTORY         int not null  comment '',
   ID_CITY              int  comment '',
   DATE_INVENTORY       date  comment '',
   FLAG_SAVING          boolean not null  comment '',
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
   ID_INVENTORY         int  comment '',
   ID_EQ                int  comment '',
   EQ_QUANTITY          float  comment ''
);

/*==============================================================*/
/* Table: SS_ORDER                                              */
/*==============================================================*/
create table SS_ORDER
(
   ID_ORDER             int not null  comment '',
   ID_PLACE             int  comment '',
   ID_CITY              int  comment '',
   ORD_DATE             date  comment '',
   END_DATE             date  comment '',
   FLAG_ORD             char(1)  comment '',
   primary key (ID_ORDER)
);

/*==============================================================*/
/* Index: ORD_DATE_IDX                                          */
/*==============================================================*/
create index ORD_DATE_IDX on SS_ORDER
(
   ORD_DATE
);

/*==============================================================*/
/* Table: SS_SPR_CITY                                           */
/*==============================================================*/
create table SS_SPR_CITY
(
   ID_CITY              int not null  comment '',
   NAME_CITY            varchar(100) not null  comment '',
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
   ID_PLACE             int not null  comment '',
   ID_CITY              int  comment '',
   NAME_PLACE           varchar(255)  comment '',
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
   ID_TYPE              int not null  comment '',
   NAME_TYPE            varchar(255)  comment '',
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

alter table SS_EQ_QUANTITY add constraint FK_SS_EQ_QU_REFERENCE_SS_ORDER foreign key (ID_ORDER)
      references SS_ORDER (ID_ORDER) on delete restrict on update restrict;

alter table SS_EQ_QUANTITY add constraint FK_SS_EQ_QU_REFERENCE_SS_EQ foreign key (ID_EQ)
      references SS_EQ (ID_EQ) on delete restrict on update restrict;

alter table SS_INVENTORY add constraint FK_SS_INVEN_REFERENCE_SS_SPR_C foreign key (ID_CITY)
      references SS_SPR_CITY (ID_CITY) on delete restrict on update restrict;

alter table SS_INV_EQ_CON add constraint FK_SS_INV_E_REFERENCE_SS_INVEN foreign key (ID_INVENTORY)
      references SS_INVENTORY (ID_INVENTORY) on delete restrict on update restrict;

alter table SS_INV_EQ_CON add constraint FK_SS_INV_E_REFERENCE_SS_EQ foreign key (ID_EQ)
      references SS_EQ (ID_EQ) on delete restrict on update restrict;

alter table SS_ORDER add constraint FK_SS_ORDER_REFERENCE_SS_SPR_P foreign key (ID_PLACE)
      references SS_SPR_PLACE (ID_PLACE) on delete restrict on update restrict;

alter table SS_ORDER add constraint FK_SS_ORDER_REFERENCE_SS_SPR_C foreign key (ID_CITY)
      references SS_SPR_CITY (ID_CITY) on delete restrict on update restrict;

alter table SS_SPR_PLACE add constraint FK_SS_SPR_P_REFERENCE_SS_SPR_C foreign key (ID_CITY)
      references SS_SPR_CITY (ID_CITY) on delete restrict on update restrict;

