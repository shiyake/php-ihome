drop database iauthServer2;
create database iauthServer2;
use iauthServer2;
create table app_info (
       app_id 	      char(16) binary not null,
       app_secret     char(48) binary not null,
       app_type	      enum('UAC','WSC','RP') default 'RP',
       status	      enum('normal','debug','disable') default 'disable',
       app_name	      char(32),
       -- following for WSC only,
       call_back      char(255),
       login_url      char(255),
       PRIMARY KEY (app_id))TYPE=MyISAM;

create table api_info (
       api_id	      int unsigned not null auto_increment,
       hash	      char(40) binary not null,
       api_url	      char(255) binary not null,
       owner_id	      char(16) binary not null,
       status	      enum('normal','debug','disable') default 'disable',
       api_name	      char(32),
       PRIMARY KEY (api_id))TYPE=MyISAM;

create table auth_token (
       app_id 	      char(16) binary not null,
       user_id	      int unsigned not null,
       rights	      char(255) default '',
       access_token   char(48) binary,
       access_secret  char(48) binary,
       create_t	      timestamp not null default current_timestamp,
       faile_t	      timestamp not null,
       UNIQUE KEY (app_id,user_id,access_token,access_secret))TYPE=MyISAM;

create table request_nonce (
       client_id      char(16) binary not null,
       target_id      int unsigned not null,
       rtype	      enum('login','auth','verify') not null default 'verify',
       ip	      char(48) binary not null,
       content	      char(255) binary not null default '',
       nonce	      char(16) binary not null,
       create_t	      timestamp not null default current_timestamp,
       faile_t	      timestamp not null)TYPE=MEMORY;
