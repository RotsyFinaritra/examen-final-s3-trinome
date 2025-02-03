select i.path
  from agence_immobiliere_image i
  join agence_immobiliere_image_habitation ih
on i.id_image = ih.id_image
 where ih.id_habitation = 1
 order by i.id_image desc;


-- delete from agence_immobiliere_image where id_image > 10;
-- delete from agence_immobiliere_image_habitation where id_image > 10;
-- delete from agence_immobiliere_habitation where id_habitation > 10;