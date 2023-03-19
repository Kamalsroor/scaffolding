<?php

namespace Modules\Product\Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Modules\Product\Entities\Attribute;
use Modules\Product\Interfaces\AttributeRepositoryInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class AttributeSeeder extends Seeder
{

  public AttributeRepositoryInterface $BaseRepository;

  public function __construct(AttributeRepositoryInterface $BaseRepository )
  {
      // $this->authorizeResource(Attribute::class);
      $this->BaseRepository = $BaseRepository;
  }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dd('this is sponser seeder ');
        // $this->call(RoleSeeder::class);
            $amount = 20;
            // The output
            $output = new ConsoleOutput();
            $data = $this->data();
            // creates a new progress bar (50 units)
            $progressBar = new ProgressBar($output, count($data));

            // starts and displays the progress bar
            $progressBar->start();
            $locales = config('translatable.locales');

            foreach ($data as $key => $attribute) {
            //  dd($attribute);
                $Parant_attribute = [];
                foreach($locales as $locale){

                  $Parant_attribute['name'][$locale] =  $attribute['name'];
                }
                $Parant_attribute['parent_id'] =  0;
                $Parant_attribute['order_id'] =  $key;
                $Parant_attribute['active'] =  true;
                $Parant_attribute['have_child'] =  false;

                $Parant_attribute = Attribute::create($Parant_attribute);
                if(isset($attribute['childs']) && is_array($attribute['childs']) ){
                  $Parant_attribute->have_child =  true;
                  $Parant_attribute->save();
                  foreach ($attribute['childs'] as $key => $child) {
                    $newChild = [];
                    foreach($locales as $locale){
                      $newChild['name'][$locale] =  $child;
                    }
                    $newChild['order_id'] =  $key;
                    $newChild['active'] =  true;
                    $newChild['have_child'] =  false;
                    $Parant_attribute->subAttribute()->create($newChild);
                  }
                }

            }


        // ensures that the progress bar is at 100%
        $progressBar->finish();




    }

    public function data()
    {
       return [
          [
            'name' => 'housing',
            'childs' => [
              'matral',
              'weight'
            ]
          ],
          [
            'name' => 'lighting',
            'childs' => [
              'infrared',
              'visible'
            ]
          ],
          [
            'name' => 'digital i/o',
            'childs' => [
              'digital out',
              'digital in'
            ]
          ],
          [
            'name' => 'cameras',
            'childs' => [
              '2x infrared camera',
              '1x color camera'
            ]
          ],
          [
            'name' => 'cameras and tilt unit',
            'childs' => [
              'angle',
              'speed',
              'accuracy',
            ]
          ],
          [
            'name' => 'ultrasonic sensor',
            'childs' => [
              'distance',
              'accuracy',
              'frequency',
            ]
          ],
          [
            'name' => 'vicinity',
            'childs' => [
              'operating temperature',
              'operating humidity',
              'storage temperature',
              'storage humidity',
            ]
          ],
          [
            'name' => 'electricity and connections',
          ],
          [
            'name' => 'certifications',
          ],
          [
            'name' => 'tilting unit',
            'childs' => [
              'angle',
              'speed',
              'accuracy',
            ]
          ],
          [
            'name' => 'environment',
            'childs' => [
              'operating temperature',
              'humidity during operating',
              'storage temperature',
              'humidity during storage',
            ]
          ],
          [
            'name' => 'power and connections',
            'childs' => [
              'operating temperature',
              'humidity during operating',
              'storage temperature',
              'humidity during storage',
            ]
          ],
       ];

    }
}
