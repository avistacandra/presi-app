<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt ('12345'),
                'level' => '1',
                'email' => 'adminavista@gmail.com',
            ],
            [
                'name' => 'Kenny Widiastuti',
                'username' => 'guru',
                'password' => bcrypt('12345'),
                'level' => '2',
                'email' => 'kennyguru@gmail.com',
            ],
            [
                'name' => 'Mayang Sari',
                'username' => 'tata usaha',
                'password' => bcrypt('12345'),
                'level' => '3',
                'email' => 'mayangtatausaha@gmail.com',
            ],
            [
                'name' => 'Rodiyah Saidah',
                'username' => 'guru piket',
                'password' => bcrypt('12345'),
                'level' => '4',
                'email' => 'rodiyahgurupiket@gmail.com',
            ],
        ];
        
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}

            // $table->id();
            // $table->enum('semester', ['Ganjil', 'Genap']);
            // $table->enum('status_sem', ['AKTIF', 'TIDAK AKTIF']);
            // $table->timestamps();

    //             protected $fillable = [
    //     'id',
    //     'semester',
    //     'status_sem'
    // ];
    // protected $table = 'tb_semester';
    // public $timestamps = false;

            // $table->id();
            // $table->string('thn_ajaran', 10);
            // $table->enum('status_ta', ['AKTIF', 'TIDAK AKTIF']);
            // $table->timestamps();


    // protected $fillable = [
    //     'id',
    //     'thn_ajaran',
    //     'status_ta'
    // ];
    // protected $table = 'tb_thn_ajaran';
    // public $timestamps = false;

            // $table->id();
            // $table->foreignId('nip')->constrained('tb_guru')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('mapel_id')->constrained('tb_mapel')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('hari', 20);
            // $table->string('jam_belajar', 20);
            // $table->foreignId('semester_id')->constrained('tb_semester')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('tahunajaran_id')->constrained('tb_thn_ajaran')->onDelete('cascade')->onUpdate('cascade');
            // $table->timestamps();

    // protected $fillable = [
    //     'id',
    //     'nip',
    //     'kelas_id',
    //     'mapel_id',
    //     'hari',
    //     'jam_belajar',
    //     'semester_id',
    //     'thn_ajaran_id'
    // ];
    // protected $table = 'tb_jadwalbelajar';
    // public $timestamps = false;

    //     public function kelas():BelongsTo
    // {
    //     return $this->belongsTo(tb_kelas::class);
    // }
    // public function mapel():BelongsTo
    // {
    //     return $this->belongsTo(tb_mapel::class);
    // }
    // public function tahunajaran():BelongsTo
    // {
    //     return $this->belongsTo(tb_thn_ajaran::class);
    // }
    // public function semester():BelongsTo
    // {
    //     return $this->belongsTo(tb_semester::class);
    // }
    // public function guru():BelongsTo
    // {
    //     return $this->belongsTo(tb_guru::class);
    // }


    // punya siswa
    // public function kelas():BelongsTo
    // {
    //     return $this->belongsTo(tb_kelas::class);
    // }

    // // protected $guarded = [];
    // protected $fillable = [
    //     'nis',
    //     'nm_siswa',
    //     'kelas_id',
    //     'je_kel'
    // ];
    // protected $table = 'tb_siswa';
    // public $timestamps = false;

    //      $table->char('nis', 4)->unique();
    //         $table->primary('nis');
    //         $table->string('nm_siswa', 50);
    //         $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
    //         // $table->bigInteger('kelas_id')->unsigned();
    //         $table->enum('jns_kelamin', ['P', 'L']);
    //     });

        // punya guru

    //      $table->string('nip', 18)->unique();
    //         $table->primary('nip');
    //         $table->string('nm_guru', 50);
    //         // $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
    //         // $table->bigInteger('kelas_id')->unsigned();
    //         $table->enum('je_kel', ['P', 'L']);
    //         $table->string('golongan', 50);
    //         $table->string('tgs_tambahan');
    //     });

    //     use HasFactory;

    // public function jadwalbelajar(): HasMany
    // {
    //     return $this->hasMany(tb_jadwalbelajar::class);
    // }

    // protected $fillable = [
    //     'nip',
    //     'nm_guru',
    //     'je_kel',
    //     'golongan',
    //     'tgs_tambahan'
    // ];
    // protected $table = 'tb_guru';
    // public $timestamps = false;
