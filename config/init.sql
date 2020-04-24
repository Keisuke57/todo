create database users_data;

grant all on useres_data.* to dbuser@localhost identified by 'arn3dK7';

use users_data

create table users(
  id int not null auto_increment primary key,
  email varchar(255) unique,
  password varchar(255),
  created datetime,
  modefied datetime
);

desc users;
--createdは作成日時
--modifiedは更新日時
