<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Category;
use DB;

class InsertCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product_category:insert {name} {slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert new category';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            DB::beginTransaction();
            Category::insert([
                'name' => $this->argument('name'),
                'slug' => $this->argument('slug'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::commit();
            $this->info('Insert Data console successfull');
            \Log::info('Insert Data console successfull'. date('Y-m-d H:i:s'));
        }catch (\Exception $e){
            DB::rollback();
            $this->info('Có lỗi trong quá trình xử lý '. $e->getMessage());
            \Log::error('Insert Data console failed:' . $e->getMessage());
        }
        
    }
}
