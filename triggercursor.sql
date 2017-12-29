CREATE OR REPLACE TRIGGER trigger_checkout
  AFTER INSERT ON orderProduk
DECLARE
  CURSOR c_jumlah IS
    SELECT idCart, SUM(JUMLAHPRODUK) jumlah
    FROM cartItem;
BEGIN
  FOR v_jumlah in c_jumlah LOOP
    UPDATE stok b SET b.stok = b.stok - v_jumlah.jumlah WHERE
    idProduk = (SELECT a.idProduk FROM cartItem a WHERE a.idCart = v_jumlah.idCart) AND ukuran = (SELECT a.ukuran FROM cartItem a WHERE a.idCart = v_jumlah.idCart);
  END LOOP;
END;
/
