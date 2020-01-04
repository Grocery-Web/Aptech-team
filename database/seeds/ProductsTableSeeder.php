<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Honeywell HT-900 TurboForce Air Circulator Fan Black',
            'description'     =>   'SMALL FAN FOR TABLE OR FLOOR: The Honeywell Turbo Force Air Circulator Fan has 3 speeds & a 90 degree pivoting head; This quiet fan is compact enough for on a table or wall mount & powerful enough to help provide comfortable cooling in small medium rooms',
            'weight'     =>   '10',
            'width'     =>   '12',
            'depth'     =>   '11',
            'height'     =>   '14',
            'producer'     =>   'Honeywell',
            'price'     =>   '154',
            'cate_id'     =>   '4',
            'quantity'     =>   '14',
            'image'     =>   'Honeywell HT-900 TurboForce Air Circulator Fan Black.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Genesis 6-Inch Clip Convertible Table-Top',
            'description'     =>   'Dual features: this fan conveniently converts from a clip on fan to a table top fan so you can enjoy its features at your desk or from any other preferred angle in your space',
            'weight'     =>   '8',
            'width'     =>   '12',
            'depth'     =>   '14',
            'height'     =>   '21',
            'producer'     =>   'Genesis',
            'price'     =>   '162',
            'cate_id'     =>   '4',
            'quantity'     =>   '17',
            'image'     =>   'Genesis 6-Inch Clip Convertible Table-Top.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Holmes Heritage 4-Inch Mini USB Desk Fan',
            'description'     =>   '4-inch blades cast a powerful cool breeze
            USB powered for work or home compatibility',
            'weight'     =>   '4',
            'width'     =>   '2',
            'depth'     =>   '4',
            'height'     =>   '12',
            'producer'     =>   'Holmes',
            'price'     =>   '12',
            'cate_id'     =>   '4',
            'quantity'     =>   '44',
            'image'     =>   'Holmes Heritage 4-Inch Mini USB Desk Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Lasko 3-Speed 12-Table Fan',
            'description'     =>   'Plastic / Metel
            Imported three quiet speeds with easy-grip rotary control',
            'weight'     =>   '5',
            'width'     =>   '3',
            'depth'     =>   '7',
            'height'     =>   '69',
            'producer'     =>   'Lasko',
            'price'     =>   '61',
            'cate_id'     =>   '4',
            'quantity'     =>   '412',
            'image'     =>   'Lasko 3-Speed 12-Table Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'O2COOL Treva 5-Inch Portable Desktop Air Circulation Battery Fan',
            'description'     =>   'MINI BATTERY-OPERATED FAN. Cool off when you’re at home, work or outdoors with O2COOL’s 5-Inch Battery-Operated Portable Fan. This compact fan won’t take up much space and features a convenient folding design for easy storage and transport.(Brand name on the fan may vary between O2COOL and TREVA)',
            'weight'     =>   '5',
            'width'     =>   '3',
            'depth'     =>   '7',
            'height'     =>   '68',
            'producer'     =>   'O2COOL',
            'price'     =>   '16',
            'cate_id'     =>   '4',
            'quantity'     =>   '42',
            'image'     =>   'O2COOL Treva 5-Inch Portable Desktop Air Circulation Battery Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Genesis Twin Window Fan with 9 Inch Blades, High Velocity Reversible AirFlow Fan',
            'description'     =>   '3 speed settings: the Avalon high velocity Twin reversible airflow window fan features 3 speed settings of low, medium and high. Select your comfort speed level with ease',
            'weight'     =>   '12',
            'width'     =>   '4',
            'depth'     =>   '7',
            'height'     =>   '6',
            'producer'     =>   'Genesis',
            'price'     =>   '125',
            'cate_id'     =>   '4',
            'quantity'     =>   '42',
            'image'     =>   'Genesis Twin Window Fan with 9 Inch Blades, High Velocity Reversible AirFlow Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Simple Deluxe 2 Pack-6 Inch Clip on Desk Removable Pedestal and Electric Plug',
            'description'     =>   'Fully Adjustable Fan Head - 90° degree of vertical tilt and 360° rotatable hinge gives you complete control over the direction of the cooling fans air flow.',
            'weight'     =>   '11',
            'width'     =>   '8',
            'depth'     =>   '5',
            'height'     =>   '11',
            'producer'     =>   'Simple Deluxe ',
            'price'     =>   '12',
            'cate_id'     =>   '5',
            'quantity'     =>   '41',
            'image'     =>   'Simple Deluxe 2 Pack-6 Inch Clip on Desk Removable Pedestal and Electric Plug.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Ornado 660 Large Whole Room Air Circulator Fan with 4 Speeds',
            'description'     =>   'Superior performance through deep-pitched blades that move air up to 100 feet. High Speed RPM : 1375. Low Speed RPM : 600.',
            'weight'     =>   '21',
            'width'     =>   '4',
            'depth'     =>   '5',
            'height'     =>   '11',
            'producer'     =>   'Ornado',
            'price'     =>   '99',
            'cate_id'     =>   '5',
            'quantity'     =>   '22',
            'image'     =>   'ornado 660 Large Whole Room Air Circulator Fan with 4 Speeds.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'HONEYWELL Dreamweaver Sleep Fan',
            'description'     =>   'SLEEP FAN: The Dreamweaver Sleep Fan is more than a sound machine, it generates constant soothing pink noise with sound blocking benefits with or without airflow, allowing you to customize your sleep environment any night of the year.',
            'weight'     =>   '63',
            'width'     =>   '50',
            'depth'     =>   '51',
            'height'     =>   '41',
            'producer'     =>   'HONEYWELL',
            'price'     =>   '54',
            'cate_id'     =>   '5',
            'quantity'     =>   '27',
            'image'     =>   'HONEYWELL Dreamweaver Sleep Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Treva 10-Inch Portable Desktop Air Circulation Battery Fan',
            'description'     =>   'SLEEP FAN: The Dreamweaver Sleep Fan is more than a sound machine, it generates constant soothing pink noise with sound blocking benefits with or without airflow, allowing you to customize your sleep environment any night of the year.',
            'weight'     =>   '36',
            'width'     =>   '12',
            'depth'     =>   '21',
            'height'     =>   '14',
            'producer'     =>   'O2COOL',
            'price'     =>   '48',
            'cate_id'     =>   '5',
            'quantity'     =>   '28',
            'image'     =>   'Treva 10-Inch Portable Desktop Air Circulation Battery Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Vornado VFAN Mini Classic Personal Vintage Air Circulator Fan',
            'description'     =>   'Metal construction with authentic VFAN styling Utilizes Vornadosignature Vortex air circulation.',
            'weight'     =>   '31',
            'width'     =>   '13',
            'depth'     =>   '23',
            'height'     =>   '18',
            'producer'     =>   'Vornado',
            'price'     =>   '34',
            'cate_id'     =>   '5',
            'quantity'     =>   '200',
            'image'     =>   'Vornado VFAN Mini Classic Personal Vintage Air Circulator Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Vornado Pivot Personal Air Circulator Fan',
            'description'     =>   'Utilizes Vornados signature Vortex Action air circulation
            3 speed settings and pivoting axis to control airflow direction
            Compact size makes it perfect for desk or nightstand use.',
            'weight'     =>   '22',
            'width'     =>   '33',
            'depth'     =>   '34',
            'height'     =>   '17',
            'producer'     =>   'Vornado',
            'price'     =>   '34',
            'cate_id'     =>   '5',
            'quantity'     =>   '201',
            'image'     =>   'Vornado Pivot Personal Air Circulator Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Honeywell Ceiling Fans 50195 Rio 54 Ceiling Fan',
            'description'     =>   'QUALITY DESIGN: Features a brushed nickel finish, 3 black matte ceiling fan blades with a beautifully frosted, cased white glass bowl light (2 x 13 watt CFL bulbs included).',
            'weight'     =>   '44',
            'width'     =>   '33',
            'depth'     =>   '37',
            'height'     =>   '17',
            'producer'     =>   'Honeywell',
            'price'     =>   '34',
            'cate_id'     =>   '6',
            'quantity'     =>   '250',
            'image'     =>   'Honeywell Ceiling Fans 50195 Rio 54 Ceiling Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Portage Bay 50251 Hugger',
            'description'     =>   'LOW CEILINGS?: No problem, this ceiling fan measures 11.5 inches from ceiling to bottom of light fixture',
            'weight'     =>   '14',
            'width'     =>   '99',
            'depth'     =>   '66',
            'height'     =>   '18',
            'producer'     =>   'Portage Bay',
            'price'     =>   '96',
            'cate_id'     =>   '6',
            'quantity'     =>   '14',
            'image'     =>   'Portage Bay 50251 Hugger.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Harbor Breeze Mazon 44-in Brushed Nickel Flush Mount Indoor Ceiling Fan',
            'description'     =>   'Brand new model and design makes this name brand ceiling fan stand alone. With its sleek mid-body layout, this fan has a contemporary take on the traditional ceiling fan. The design is coherent, compact, and able to fit perfectly in a medium or small room or office. A top seller with Industry leading materials, powerful motor, along with an integrated led light fixture that will give you the light and air movement you need to feel right at home.',
            'weight'     =>   '55',
            'width'     =>   '99',
            'depth'     =>   '99',
            'height'     =>   '12',
            'producer'     =>   'Harbor Breeze',
            'price'     =>   '69',
            'cate_id'     =>   '6',
            'quantity'     =>   '11',
            'image'     =>   'Harbor Breeze Mazon 44-in Brushed Nickel Flush Mount Indoor Ceiling Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Honeywell Carmel 48-Inch Ceiling Fan with Integrated Light Kit',
            'description'     =>   'QUALITY DESIGN: Features an oil-rubbed bronze finish with a beautifully frosted, cased white glass bowl light (3 x 40 watt bulbs included). Designed with 2 separate blade finishes, cimarron on one side and ironwood on the other.',
            'weight'     =>   '45',
            'width'     =>   '98',
            'depth'     =>   '94',
            'height'     =>   '42',
            'producer'     =>   'Honeywell',
            'price'     =>   '49',
            'cate_id'     =>   '6',
            'quantity'     =>   '44',
            'image'     =>   'Honeywell Carmel 48-Inch Ceiling Fan with Integrated Light Kit.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Harbor Breeze Twin Breeze Ii 74-in Oil-rubbed Bronze Outdoor Downrod Ceiling Fan',
            'description'     =>   'Award winning double fan ceiling fan displays outstanding beauty with lifetime of durability. This industry recognized name brand fan is built for looks and to last. This stunning and newly updated model has even more durable material and powerful quiet motor technology.',
            'weight'     =>   '41',
            'width'     =>   '91',
            'depth'     =>   '49',
            'height'     =>   '44',
            'producer'     =>   'Harbor Breeze',
            'price'     =>   '49',
            'cate_id'     =>   '6',
            'quantity'     =>   '27',
            'image'     =>   'Harbor Breeze Twin Breeze Ii 74-in Oil-rubbed Bronze Outdoor Downrod Ceiling Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Hunter Indoor Low Profile Ceiling Fan, with pull chain control',
            'description'     =>   'Reversible motor allows you to change the direction of your fan from downdraft mode during the summer which helps cool the room to updraft mode during the winter to help circulate trapped warm air near the ceiling',
            'weight'     =>   '52',
            'width'     =>   '64',
            'depth'     =>   '43',
            'height'     =>   '48',
            'producer'     =>   'Hunter Indoor',
            'price'     =>   '149',
            'cate_id'     =>   '6',
            'quantity'     =>   '72',
            'image'     =>   'Hunter Indoor Low Profile Ceiling Fan, with pull chain control.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Iliving 10 Inch Variable Speed Shutter Exhaust Fan, Wall-Mounted',
            'description'     =>   '10 inch variable speed shutter exhaust fan with automatic Shutters
            UL listed with speed controllable, permanently lubricated motor',
            'weight'     =>   '25',
            'width'     =>   '46',
            'depth'     =>   '34',
            'height'     =>   '84',
            'producer'     =>   'Iliving',
            'price'     =>   '194',
            'cate_id'     =>   '7',
            'quantity'     =>   '69',
            'image'     =>   'Iliving 10 Inch Variable Speed Shutter Exhaust Fan, Wall-Mounted.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Delta BreezSlim SLM70 70 CFM Exhaust Bath Fan',
            'description'     =>   'PERFORMANCE: DC motor fan is tested to run continuously for 70, 000 hours (8 years)
            LOW NOISE: Shower in peace with a noise level of 2. 0 sones',
            'weight'     =>   '52',
            'width'     =>   '48',
            'depth'     =>   '41',
            'height'     =>   '81',
            'producer'     =>   'Delta BreezSlim',
            'price'     =>   '294',
            'cate_id'     =>   '7',
            'quantity'     =>   '42',
            'image'     =>   'Delta BreezSlim SLM70 70 CFM Exhaust Bath Fan.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'MaxxAir IF14UPS Powerful Industrial Exhaust Fan, Wall-Mounted, 14-Inch',
            'description'     =>   'INDUSTRIAL EXHAUST FAN: This MaxxAir 14" Industrial Exhaust Fan is a powerful fan that can be used in garages, barns, greenhouses, and a variety of other locations. It features 14” fan blades with overall unit dimensions of 13” x 18” x 18”. Rough-in opening is 17.25” x 17.25”',
            'weight'     =>   '51',
            'width'     =>   '43',
            'depth'     =>   '45',
            'height'     =>   '31',
            'producer'     =>   'MaxxAir',
            'price'     =>   '232',
            'cate_id'     =>   '7',
            'quantity'     =>   '45',
            'image'     =>   'MaxxAir IF14UPS Powerful Industrial Exhaust Fan, Wall-Mounted, 14-Inch.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Broan-NuTone 688 Ceiling and Wall Ventilation Fan, 50 CFM 4.0 Sones, White Plastic Grille',
            'description'     =>   'VERSATILE FAN: Ventilation fan helps eliminate humidity, tobacco smoke, and cooking odors. Install the compact fan between ceiling joists or wall studs - wherever its needed most!',
            'weight'     =>   '54',
            'width'     =>   '49',
            'depth'     =>   '47',
            'height'     =>   '14',
            'producer'     =>   'Broan-NuTone',
            'price'     =>   '32',
            'cate_id'     =>   '7',
            'quantity'     =>   '400',
            'image'     =>   'Broan-NuTone 688 Ceiling and Wall Ventilation Fan, 50 CFM 4.0 Sones, White Plastic Grille.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Holmes Window Fan with Twin 6-Inch Reversible Airflow Blades, White',
            'description'     =>   'VERSATILE FAN: Ventilation fan helps eliminate humidity, tobacco smoke, and cooking odors. Install the compact fan between ceiling joists or wall studs - wherever its needed most!',
            'weight'     =>   '54',
            'width'     =>   '49',
            'depth'     =>   '47',
            'height'     =>   '14',
            'producer'     =>   'Holmes',
            'price'     =>   '32',
            'cate_id'     =>   '7',
            'quantity'     =>   '400',
            'image'     =>   'Holmes Window Fan with Twin 6-Inch Reversible Airflow Blades, White.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Hon&Guan 6 Inch Home Ventilation Fan Bathroom Garage Exhaust Fan Ceiling',
            'description'     =>   '【Modern design】❄️ Modern design and good looking, the unit provides continuous and quiet ventilation to allow speedy reduction of humidity levels and avoid mildew and mould growth. Paremeters: Air flow 160 CFM, Power:25w, Voltage: 110v',
            'weight'     =>   '51',
            'width'     =>   '48',
            'depth'     =>   '74',
            'height'     =>   '42',
            'producer'     =>   'Hon&Guan',
            'price'     =>   '301',
            'cate_id'     =>   '7',
            'quantity'     =>   '00',
            'image'     =>   'Hon&Guan 6 Inch Home Ventilation Fan Bathroom Garage Exhaust Fan Ceiling.jpg',
        ]);

        DB::table('products')->insert([
            'user_id'     =>   '1',
            'name'     =>   'Panasonic FV-30VQ3 WhisperCeiling Ventilation Fan, Quiet Air Flow, Long Lasting, Easy to Install',
            'description'     =>   'Quiet Air Flow: Designed for light commercial applications, this powerful yet quiet ventilation fan moves 290 CFM of air at 2.0 sones',
            'weight'     =>   '54',
            'width'     =>   '41',
            'depth'     =>   '71',
            'height'     =>   '43',
            'producer'     =>   'Panasonic',
            'price'     =>   '301',
            'cate_id'     =>   '7',
            'quantity'     =>   '00',
            'image'     =>   'Panasonic FV-30VQ3 WhisperCeiling Ventilation Fan, Quiet Air Flow, Long Lasting, Easy to Install.jpg',
        ]);
    }
}
