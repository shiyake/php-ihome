create table if not exists ihome_tagcloud (
    id int(10) auto_increment primary key,
    tag_word varchar(20) not null,
    tag_count int(10) not null) default charset = utf8;
    
