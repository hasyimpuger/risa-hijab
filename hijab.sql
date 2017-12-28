conn system

create user risa identified by risa;
grant connect to risa;
grant all privileges to risa;
connect risa;

create table admin (
	idAdmin number(10) primary key,
	namaAdmin varchar2(40) not null,
	username varchar2(50) not null,
  password varchar2(50) not null
);

create table bank (
	idBank number(10) primary key,
	namaBank varchar2(40) not null,
	noRekening varchar2(50) not null,
  namaRekening varchar2(50) not null
);

create table pembayaran (
	idPembayaran number(10) primary key,
  idAdmin number(10) not null,
  idBank number(10) not null,
	tanggalPembayaran date not null,
	totalPembayaran number(10) not null,
  constraint fk_idAdmin foreign key(idAdmin) references admin(idAdmin) on delete cascade,
  constraint fk_idBank foreign key(idBank) references bank(idBank) on delete cascade
);

create table kurir (
	idKurir number(10) primary key,
	namaKurir varchar2(40) not null
);

create table paket (
	idPaket number(10) primary key,
	idKurir number(10) not null,
	namaPaket varchar2(20) not null,
  ongkosKirim number(10) not null,
  constraint fk_idKurir foreign key(idKurir) references kurir(idKurir) on delete cascade
);

create table negara (
  idNegara number(10) primary key,
  namaNegara varchar2(20) not null
);

create table provinsi (
  idProvinsi number(10) primary key,
  namaProvinsi varchar2(30) not null
);

create table kota (
  idKota number(10) primary key,
  namaKota varchar2(30) not null
);

create table kodepos (
  idKodePos number(10) primary key,
  idNegara number(10) not null,
  idProvinsi number(10) not null,
  idKota number(10) not null,
  constraint fk_idNegara foreign key(idNegara) references negara(idNegara) on delete cascade,
  constraint fk_idProvinsi foreign key(idProvinsi) references provinsi(idProvinsi) on delete cascade,
  constraint fk_idKota foreign key(idKota) references kota(idKota) on delete cascade
);

create table alamat (
  idAlamat number(10) primary key,
  idKodePos number(10) not null,
  detailAlamat varchar2(1000) not null,
  constraint fk_idKodePos foreign key(idKodePos) references kodepos(idKodePos) on delete cascade
);

create table orderStatus (
  idStatusOrder number(10) primary key,
  namaStatus varchar2(20) not null
);

create table pelanggan (
  idPelanggan number(10) primary key,
  namaDepan varchar2(20) not null,
  namaBelakang varchar2(20) not null,
  tempatLahir varchar2(20) not null,
  tanggalLahir date not null,
  noHP number(15) not null,
  email varchar2(30) not null,
  password varchar2(20) not null
);

create table cart (
	idCart number(10) primary key,
	idPelanggan number(10) not null,
	totalHarga number(10) not null,
	cartStatus number(4) not null,
	constraint fk_idPelanggan4 foreign key(idPelanggan) references pelanggan(idPelanggan) on delete cascade
);

create table orderProduk (
  idOrder number(10) primary key,
  idStatusOrder number(10) not null,
  idKurir number(10) not null,
  idAlamat number(10) not null,
  idPelanggan number(10) not null,
  idCart number(10) not null,
  tglOrder date not null,
  totalOrder number(10) not null,
  constraint fk_idStatusOrder foreign key(idStatusOrder) references orderStatus(idStatusOrder) on delete cascade,
  constraint fk_idKurir1 foreign key(idKurir) references kurir(idKurir) on delete cascade,
  constraint fk_idAlamat1 foreign key(idAlamat) references alamat(idAlamat) on delete cascade,
  constraint fk_idPelanggan foreign key(idPelanggan) references pelanggan(idPelanggan) on delete cascade,
  constraint fk_idCart foreign key(idCart) references cart(idCart) on delete cascade
);

create table fotoProduk (
  idFotoProduk number(10) primary key,
	idProduk number(10) not null,
  lokasiFoto varchar2(1000) not null,
	constraint fk_idProduk foreign key(idProduk) references produk(idProduk) on delete cascade
);

create table kategori (
  idKategori number(10) primary key,
  namaKategori varchar2(30) not null
);

create table produk (
  idProduk number(10) primary key,
  idKategori number(10) not null,
  namaProduk varchar2(30) not null,
  hargaProduk number(10) not null,
  diskonProduk number(10) not null,
  deskripsiProduk varchar2(1000),
  constraint fk_idKategori foreign key(idKategori) references kategori(idKategori) on delete cascade
);

create table stok (
  idStok number(10) primary key,
  idProduk number(10) not null,
  ukuran varchar2(10) not null,
  stok number(10) not null,
  constraint fk_idProduk1 foreign key(idProduk) references produk(idProduk) on delete cascade
);

create table cartItem (
  idCartItem number(10) primary key,
  idCart number(10) not null,
  idProduk number(10) not null,
  harga number(10) not null,
	ukuran varchar2(10) not null,
  jumlahProduk number(10) not null,
  constraint fk_idCart2 foreign key(idCart) references cart(idCart) on delete cascade,
  constraint fk_idProduk2 foreign key(idProduk) references produk(idProduk) on delete cascade
);

create sequence seq_idAdmin increment by 1;
create sequence seq_idBank increment by 1;
create sequence seq_idPembayaran increment by 1;//
create sequence seq_idKurir increment by 1;
create sequence seq_idPaket increment by 1;
create sequence seq_idNegara increment by 1;
create sequence seq_idProvinsi increment by 1;
create sequence seq_idKota increment by 1;
create sequence seq_idKodePos increment by 1;
create sequence seq_idAlamat increment by 1;
create sequence seq_idStatusOrder increment by 1;
create sequence seq_idPelanggan increment by 1;
create sequence seq_idCart increment by 1;
create sequence seq_idOrder increment by 1;
create sequence seq_idFotoProduk increment by 1;
create sequence seq_idKategori increment by 1;
create sequence seq_idProduk increment by 1;
create sequence seq_idStok increment by 1;
create sequence seq_idCartItem increment by 1;
