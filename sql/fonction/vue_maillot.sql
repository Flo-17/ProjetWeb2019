 SELECT maillot.image,
    maillot.numprod,
    maillot.couleur,
    maillot.taille,
    maillot.equipe,
    info_produit.idproduit,
    info_produit.phtva,
    info_produit.stock,
    type.id_type,
    type.desc_type
   FROM maillot,
    info_produit,
    type
  WHERE maillot.numprod = info_produit.idproduit AND type.id_type = maillot.id_type;