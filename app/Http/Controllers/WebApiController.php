<?php

namespace App\Http\Controllers;

use App\Models\Backend\Berita;
use App\Models\Backend\BungaPinjaman;
use App\Models\Backend\Layanan;
use App\Models\Backend\Profile;
use App\Models\Backend\Rekruitmen;
use App\Models\Backend\LaporanPublikasi;
use App\Models\Backend\LaporanLain;
use App\Models\Backend\Umkm;
use App\Models\BannerModel;
use App\Models\CommonPagesModel;
use App\Models\Frontend\Dashboard;
use App\Models\Frontend\Lelang;
use App\Models\Frontend\RekruitmenData;
use App\Models\JaringanKantorModel;
use App\Models\LaporanModel;
use App\Models\LelangModel;
use App\Models\MasterPengajuanDepositoModel;
use App\Models\MasterPengajuanTabunganModel;
use App\Models\ProdukLayananModel;
use App\Models\ProfileModel;
use App\Models\RekruitmenModel;
use App\Models\UMKMModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebApiController extends Controller
{
	public function getdashboard(Request $r)
	{
		// TOP BANNER

		$banner = BannerModel::where('type', 0)   // 0 = top	             // 1 = aktif (sesuaikan dengan sistem kamu)
			->where(function ($q) {
				$q->whereNull('tampil_start')
					->orWhere('tampil_start', '<=', now());
			})
			->where(function ($q) {
				$q->whereNull('tampil_end')
					->orWhere('tampil_end', '>=', now());
			})
			->orderBy('created_at', 'desc')
			->get();

		$topbannercontent = $banner->map(function ($b) {
			return [
				'id' => $b->id,
				'name' => $b->name,
				'type' => $b->type,
				'url' => $b->url_mobile
					? asset($b->url_mobile)
					: asset($b->url),
			];
		});

		// PRODUK $ LAYANAN

		$produk = ProdukLayananModel::where('type', 0)
			->orderBy('urutan', 'asc')
			->orderBy('created_at', 'desc')
			->get();

		$produkcontent = $produk->map(function ($p) {
			return [
				'id' => $p->id,
				'title' => $p->title,
				'type' => $p->type,
				'kategori' => $p->kategori,
				'url' => $p->thumbnail
					? asset('storage/' . $p->thumbnail)
					: null,
			];
		});


		// UMKM

		$umkm = UMKMModel::latest()->limit(6)->get();

		$umkmitem = [];

		foreach ($umkm as $u) {
			$umkmitem[] = [
				'uuid' => $u->id,
				'judul' => $u->title,
				'lokasi' => $u->lokasi,
				'no_telp' => $u->no_telp,
				'alamat' => $u->alamat,
				'nilai_discount' => $u->nilai_discount,
				'rating' => $u->rating,
				'layanan' => $u->layanan,
				'deskripsi' => $u->deskripsi,
				'type_pilihan' => $u->type_pilihan,
				'thumbnail' => $u->thumbnail
					? asset('storage/' . $u->thumbnail)
					: 'https://placehold.co/100x300.png',
				'gambar' => $u->gambar
					? asset('storage/' . $u->gambar)
					: 'https://placehold.co/100x300.png',
			];
		}


		return response()->json([
			'success' => true,
			'topbanner' => $topbannercontent,
			'produk' => $produkcontent,
			'umkmitem' => $umkmitem,
		]);
	}

	public function getfooterbanner(Request $r)
	{
		$banner = BannerModel::where('type', 1)
			->where(function ($q) {
				$q->whereNull('tampil_start')
					->orWhere('tampil_start', '<=', now());
			})
			->where(function ($q) {
				$q->whereNull('tampil_end')
					->orWhere('tampil_end', '>=', now());
			})
			->orderBy('created_at', 'desc')
			->get();

		$bottombannercontent = $banner->map(function ($b) {
			return [
				'id' => $b->id,
				'name' => $b->name,
				'type' => $b->type,
				'url' => $b->url_mobile
					? asset($b->url_mobile)
					: asset($b->url),
			];
		});
		return response()->json([

			'bottombanner' => $bottombannercontent,

		]);
	}


	public function getberita(Request $r)
	{
		$berita = CommonPagesModel::where(function ($q) {
			$q->whereNull('tanggal_tampil')
				->orWhere('tanggal_tampil', '<=', now());
		})
			->orderBy('tanggal_tampil', 'desc')
			->paginate(15);

		$berita->getCollection()->transform(function ($b) {
			return [
				'id' => $b->id,
				'judul' => $b->title,
				'tag' => $b->tag,
				'kategori' => $b->kategori,
				'thumbnail' => $b->thumbnail
					? asset('storage/' . $b->thumbnail)
					: null,
				'banner' => $b->banner
					? asset('storage/' . $b->banner)
					: null,
				'tanggal' => $b->tanggal_tampil,
				'content' => $b->content,
			];
		});

		return response()->json([
			'success' => true,
			'message' => 'Data berita berhasil diambil',
			'berita' => $berita,
		]);
	}


	// public function getberita(Request $r)
	// {
	// 	$berita = CommonPagesModel::where(function ($q) {
	// 		$q->whereNull('tanggal_tampil')
	// 			->orWhere('tanggal_tampil', '<=', now());
	// 	})
	// 		->orderBy('tanggal_tampil', 'desc')
	// 		->paginate(15);

	// 	$berita->getCollection()->transform(function ($b) {

	// 		$clean = $b->content;

	// 		// 1️⃣ Hapus attribute class & style
	// 		$clean = preg_replace('/\s*(class|style)="[^"]*"/i', '', $clean);

	// 		// 2️⃣ Hapus tag span tapi pertahankan isinya
	// 		$clean = preg_replace('/<\/?span[^>]*>/', '', $clean);

	// 		// 3️⃣ Ubah &nbsp; jadi spasi biasa
	// 		$clean = str_replace('&nbsp;', ' ', $clean);

	// 		return [
	// 			'id' => $b->id,
	// 			'judul' => $b->title,
	// 			'tag' => $b->tag,
	// 			'kategori' => $b->kategori,
	// 			'thumbnail' => $b->thumbnail
	// 				? asset('storage/' . $b->thumbnail)
	// 				: null,
	// 			'banner' => $b->banner
	// 				? asset('storage/' . $b->banner)
	// 				: null,
	// 			'tanggal' => $b->tanggal_tampil,
	// 			'content' => $clean,
	// 		];
	// 	});

	// 	return response()->json([
	// 		'success' => true,
	// 		'message' => 'Data berita berhasil diambil',
	// 		'berita' => $berita,
	// 	], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	// }

	public function getlelang(Request $r)
	{
		$lelang = LelangModel::where(function ($q) {
			$q->whereNull('mulai')
				->orWhere('mulai', '<=', now());
		})
			->where(function ($q) {
				$q->whereNull('selesai')
					->orWhere('selesai', '>=', now());
			})
			->orderBy('created_at', 'desc')
			->paginate(15);

		return response()->json([
			'success' => true,
			'message' => 'Data Lelang berhasil diambil',
			'lelang' => $lelang,
		]);
	}

	public function getkarir(Request $r)
	{
		$karir = RekruitmenModel::select(
			'id',
			'judul',
			'deskripsi',
			'lokasi',
			'tipe_pekerjaan',
			'gaji_min',
			'gaji_max',
			'tanggal_posting',
			'tanggal_berakhir',
			'gambar'
		)
			->where(function ($q) {
				$q->whereNull('tanggal_posting')
					->orWhere('tanggal_posting', '<=', now());
			})
			->where(function ($q) {
				$q->whereNull('tanggal_berakhir')
					->orWhere('tanggal_berakhir', '>=', now());
			})
			->orderBy('tanggal_posting', 'desc')
			->paginate(15);

		// Ubah gambar jadi full URL
		$karir->getCollection()->transform(function ($k) {

			$k->gambar = $k->gambar
				? asset('storage/' . $k->gambar)
				: null;

			return $k;
		});

		return response()->json([
			'success' => true,
			'message' => 'Data Karir berhasil diambil',
			'karir' => $karir,
		]);
	}

	public function getkantor(Request $r)
	{
		$kantor = JaringanKantorModel::select(
			'id',
			'kantor',
			'alamat',
			'latitude',
			'longitude',
			'thumbnail',
			'no_telp'

		)
			->orderBy('kantor', 'asc')
			->get();

		$kantor->transform(function ($k) {

			$k->thumbnail = $k->thumbnail
				? asset('storage/' . $k->thumbnail)
				: null;

			return $k;
		});

		return response()->json([
			'success' => true,
			'message' => 'Data Kantor berhasil diambil',
			'kantor' => $kantor,
		]);
	}
	public function getlaporan(Request $r)
	{
		$laporan = LaporanModel::select(
			'id',
			'type',
			'tanggal',
			'title',
			'thumbnail',
			'url'
		)
			->get();

		$laporan->transform(function ($l) {
			$l->thumbnail = $l->thumbnail
				? asset('storage/' . $l->thumbnail)
				: null;
			return $l;
		});

		return response()->json([
			'success' => true,
			'message' => 'Data Laporan berhasil diambil',
			'laporan' => $laporan,
		]);
	}


	public function getsimulasi(Request $r)
	{
		$deposito = MasterPengajuanDepositoModel::select(
			'id',
			'nama',
			'tenor',
			'bunga',
			'image'
		)
			->orderBy('created_at', 'desc')
			->get();

		$tabungan = MasterPengajuanTabunganModel::select(
			'id',
			'nama',
			'bunga',
			'min',
			'image'
		)
			->orderBy('created_at', 'desc')
			->get();

		$deposito->transform(function ($d) {
			$d->image = $d->image
				? asset('storage/' . $d->image)
				: null;
			return $d;
		});

		$tabungan->transform(function ($t) {
			$t->image = $t->image
				? asset('storage/' . $t->image)
				: null;
			return $t;
		});

		return response()->json([
			'success' => true,
			'deposito' => $deposito,
			'tabungan' => $tabungan,
		]);
	}



	public function getprofil(Request $request)
	{
		$query = ProfileModel::select(
			'id',
			'type',
			'title',
			'slug',
			'banner',
			'thumbnail',
			'content',
			'created_at'
		);

		if ($request->filled('type')) {
			$query->where('type', $request->type);
		}

		$profile = $query->orderBy('created_at', 'desc')->first();

		if (!$profile) {
			return response()->json([
				'success' => false,
				'message' => 'Profile tidak ditemukan',
			]);
		}

		$profile->banner = $profile->banner
			? asset('storage/' . $profile->banner)
			: null;

		$profile->thumbnail = $profile->thumbnail
			? asset('storage/' . $profile->thumbnail)
			: null;

		return response()->json([
			'success' => true,
			'message' => 'Data Profile berhasil diambil',
			'data' => $profile
		]);
	}

	public function getumkm(Request $request)
	{
		$umkm = UMKMModel::latest()->limit(6)->get();

		$umkmitem = [];

		foreach ($umkm as $u) {
			$umkmitem[] = [
				'uuid' => $u->id,
				'judul' => $u->title,
				'lokasi' => $u->lokasi,
				'no_telp' => $u->no_telp,
				'alamat' => $u->alamat,
				'nilai_discount' => $u->nilai_discount,
				'rating' => $u->rating,
				'layanan' => $u->layanan,
				'deskripsi' => $u->deskripsi,
				'type_pilihan' => $u->type_pilihan,
				'jam_buka' => $u->jam_buka,
				'jam_tutup' => $u->jam_tutup,
				'website' => $u->website,
				'sosmed' => $u->sosmed,
				'thumbnail' => $u->thumbnail
					? asset('storage/' . $u->thumbnail)
					: 'https://placehold.co/100x300.png',
				'gambar' => $u->gambar
					? asset('storage/' . $u->gambar)
					: 'https://placehold.co/100x300.png',
			];
		}


		return response()->json([
			'success' => true,
			'message' => 'Data UMKM berhasil diambil',
			'umkmitem' => $umkmitem,
		]);
	}
}
