create table if not exists ihome_actionlog (
    id int(11) auto_increment NOT NULL,
    uid mediumint(8) unsigned not null,
    action varchar(20) NOT NULL default '',
    value varchar(200) NOT NULL default '',
    dateline int(11) NOT NULL default 0,
    primary key (id)
);

create table if not exists ihome_tagcloud (
    id int(11) not null auto_increment primary key,
    tag_word varchar(20) not null,
    tag_count int(10) not null) default character set=utf8;

create table if not exists ihome_pietable (
    id int(10) not null auto_increment primary key,
    chart_tag varchar(50) not null,
    item_tag varchar(20) not null,
    num int(11) not null,
    index chart_tag_index (chart_tag)) default character set=utf8;
