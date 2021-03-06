<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\JeuVideo as ModelsJeuVideo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JeuVideo
 * 
 * @property int $jeu_id
 * @property int $edi_id
 * @property int $con_id
 * @property character varying $jeu_nom
 * @property character varying|null $jeu_description
 * @property Carbon $jeu_dateparution
 * @property float $jeu_prixttc
 * @property character varying $jeu_codebarre
 * @property character varying|null $jeu_publiclegal
 * @property int $jeu_stock
 * 
 * @property Editeur $t_r_editeur_edi
 * @property Console $t_r_console_con
 * @property Collection|Avis[] $t_e_avis_avis
 * @property Collection|MotCle[] $t_e_motcle_mots
 * @property Collection|Photo[] $t_e_photo_phos
 * @property Collection|Video[] $t_e_video_vids
 * @property Collection|Alerte[] $t_j_alerte_ales
 * @property Collection|Favori[] $t_j_favori_favs
 * @property Collection|GenreJeu[] $t_j_genrejeu_gejs
 * @property Collection|JeuRayon[] $t_j_jeurayon_jers
 * @property Collection|LigneCommande[] $t_j_lignecommande_lecs
 *
 * @package App\Models
 */
class JeuVideo extends Model
{
	protected $table = 't_e_jeuvideo_jeu';
	protected $primaryKey = 'jeu_id';
	public $timestamps = false;

	

	protected $dates = [
		'jeu_dateparution'
	];

	

	public function editeur()
	{
		return $this->belongsTo(Editeur::class, 'edi_id', 'edi_id');
	}

	public function console()
	{
		return $this->belongsTo(Console::class, 'con_id', 'con_id');
	}

	public function avisList()
	{
		return $this->hasMany(Avis::class, 'jeu_id')->orderBy('avi_date', 'desc');
	}

	public function motcleList()
	{
		return $this->hasMany(MotCle::class, 'jeu_id');
	}

	public function photoList()
	{
		return $this->hasMany(Photo::class, 'jeu_id');
	}

	public function videoList()
	{
		return $this->hasMany(Video::class, 'jeu_id');
	}

	public function alerteList()
	{
		return $this->hasMany(Alerte::class, 'jeu_id');
	}

	public function favoriList()
	{
		return $this->hasMany(Favori::class, 'jeu_id');
	}

	// public function genreJeu()
	// {
	// 	return $this->hasMany(GenreJeu::class, 'jeu_id');
		
	// }
	public function genres()
	{
		return $this->belongsToMany(
			Genre::class,
			't_j_genrejeu_gej',
			'jeu_id',
			'gen_id',
			'jeu_id',
			'gen_id');
	}

	public function rayons()
	{
		return $this->belongsToMany(
			Rayon::class,
			't_j_jeurayon_jer',
			'jeu_id',
			'ray_id',);
	}

	public function ligneCommandeList()
	{
		return $this->hasMany(LigneCommande::class, 'jeu_id');
	}

	// protected $casts = [
	// 	'edi_id' => 'int',
	// 	'con_id' => 'int',
	// 	'jeu_nom' => 'character varying',
	// 	'jeu_description' => 'character varying',
	// 	'jeu_prixttc' => 'float',
	// 	'jeu_codebarre' => 'character varying',
	// 	'jeu_publiclegal' => 'character varying',
	// 	'jeu_stock' => 'int'
	// ];

	// protected $fillable = [
	// 	'edi_id',
	// 	'con_id',
	// 	'jeu_nom',
	// 	'jeu_description',
	// 	'jeu_dateparution',
	// 	'jeu_prixttc',
	// 	'jeu_codebarre',
	// 	'jeu_publiclegal',
	// 	'jeu_stock'
	// ];




	public function id()
	{
		return $this->jeu_id;
	}
	public function id_jeu()
	{
		return $this->jeu_id;
	}
	public function id_editeur()
	{
		return $this->edi_id;
	}
	public function id_console()
	{
		return $this->con_id;
	}
	public function nom()
	{
		return $this->jeu_nom;
	}
	public function description()
	{
		return $this->jeu_description;
	}
	public function dateParution()
	{
		return $this->jeu_dateparution;
	}
	public function prixTTC()
	{
		return $this->jeu_prixttc;
	}
	public function codeBarre()
	{
		return $this->jeu_codebarre;
	}
	public function publicLegal()
	{
		return $this->jeu_publiclegal;
	}
	public function stock()
	{
		return $this->jeu_stock;
	}
	
	public function prixTTCcentime()
	{
		return floatval((explode(".",strval($this->jeu_prixttc))[1]));
	}
	public function prixTTCeuro()
	{
		return floatval((explode(".",strval($this->jeu_prixttc))[0]));
	}

	public static function jeuxMotCle($mot){
		$jeux = JeuVideo::all();
		$jeuxMotCle = [];
		foreach($jeux as $jeu){
			foreach($jeu->motcleList as $tabMot){
				if(strcasecmp($tabMot->mot(),$mot) ==0){
					$jeuxMotCle[] = $jeu;
					break;
				}
			}
		}
		return $jeuxMotCle;
	}

	public static function chercheJeu($recherche){
		$jeux = JeuVideo::all();
		$jeuxTrouves = [];
		foreach($jeux as $jeu){
			if(str_contains(strtoupper($jeu->nom()),strtoupper($recherche))){
				$jeuxTrouves[] = $jeu;
			}
		}
		return $jeuxTrouves;

	}
}
