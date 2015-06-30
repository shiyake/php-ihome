IF NOT EXISTS (select alias from ihome_space) THEN
    alter table ihome_space add alias varchar(30);
    alter table ihome_space add identity varchar(30);
    alter table ihome_space add iden_t varchar(30);
END IF
