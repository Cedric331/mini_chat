#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: minichat
#------------------------------------------------------------

CREATE TABLE minichat(
        id_chat Int  Auto_increment  NOT NULL ,
        pseudo  Varchar (20) NOT NULL ,
        message Varchar (20) NOT NULL
	,CONSTRAINT minichat_PK PRIMARY KEY (id_chat)
)ENGINE=InnoDB COMMENT "Création de la table de chat " ;

