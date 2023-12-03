<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Listing;
use App\Models\Recipe;
use App\Models\Recording;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create demo users
        $users = User::factory(9)->create();

        // Create my user
        $users->push(User::create([
            'email' => 'lukas@gurmanai.is',
            'password' => bcrypt('password'),
            'name' => 'Lukas Vasiliauskas',
            'date_of_birth' => Date('2002-09-05'),
            'type' => 'administrator',
        ]));

        // Create groups
        $groups = collect();

        $groups->push(Group::create([
            'name' => 'Smaližiai',
            'user_id' => 1,
        ]));

        $groups->push(Group::create([
            'name' => 'Le Gurmanai',
            'user_id' => 2,
        ]));

        $groups->push(Group::create([
            'name' => 'Luko grupė',
            'user_id' => 10,
        ]));

        $groups->push(Group::create([
            'name' => 'Kita Luko grupė',
            'user_id' => 10,
        ]));

        // Add editors as group members
        $groupMembers = collect();

        $groupMembers->push(GroupMember::create([
            'user_id' => 1,
            'group_id' => 1,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 2,
            'group_id' => 2,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 10,
            'group_id' => 3,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 10,
            'group_id' => 4,
        ]));

        // Add additional group members
        $groupMembers->push(GroupMember::create([
            'user_id' => 1,
            'group_id' => 2,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 1,
            'group_id' => 3,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 2,
            'group_id' => 4,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 3,
            'group_id' => 1,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 3,
            'group_id' => 3,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 4,
            'group_id' => 4,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 5,
            'group_id' => 1,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 5,
            'group_id' => 2,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 5,
            'group_id' => 3,
        ]));

        $groupMembers->push(GroupMember::create([
            'user_id' => 5,
            'group_id' => 4,
        ]));

        // Create recipes
        $recipes = collect();

        $recipes->push(Recipe::create([
            'title' => 'Varškės tinginys su obuoliais',
            'number_of_servings' => 10,
            'preparation_time' => 'Apie 30 minučių',
            'ingredients' => 
            '420 gramų sausainių, 400 gramų varškės, 210 gramų sviesto, 110 gramų cukraus, 70 gramų grietinės, 
            70 gramų džiovintų spanguolių (nebūtina), 70 gramų migdolų (arba kitokių riešutų),
            2 vienetai obuolių (nedidelių, tvirtų), 1 šaukštelis cinamono, 1 šaukštelis vanilinio cukraus',
            'instructions' => '1. Sausainius sulaužome nedideliais gabalėliais kaip tradiciniam tinginiui.
            2. Obuoliams išpjauname sėklalizdžius ir supjaustome vidutinio dydžio kubeliais. Nuvalytų obuolių svoris turėtų būti apie 200-220 gramų
            3. Keptuvėje ant vidutinės kaitros ištirpiname gabalėlį sviesto (apie 20-30 g). Beriame du šaukštus cukraus ir pakaitiname iki cukrus beveik ištirpsta. Dedama obuolius, cinamoną ir maišydami pakaitiname 1-2 minutes iki obuoliai truputį suminkštės (bet jokiu būdu nesutiš). Nuimame nuo ugnies ir paliekame atvėsti.
            4. Į dubenį dedame varškę, minkštą kambario temperatūros sviestą, cukrų bei vanilinį cukrų. Viską sutriname rankiniu elektriniu trintuvu iki vientisos masės. Dedame grietinę ir šaukštu išmaišome.
            5. Migdolus pasmulkiname elektriniu trintuvu (arba sukapojame peiliu).
            6. Į varškės masę beriame migdolus, džiovintas spanguoles, sausainius ir viską gerai išmaišome.
            7. Į kepimo popieriumi išklotą formą (naudojau kekso, bet tinka ir kitokia) dedame dalį sausainių masės, tada - dalį ouolių, vėl sausainių masės, vėl obuolių ir taip kol sudėsime visus ingredientus. Šaukštu gerai viską suspaudžiame, kad neliktų tarpelių.
            8. Dedame į šaldytuvą ben 6-8 valandoms (o dar geriau, nakčiai), kad varškės tinginys sustingtų ir sausainiai suminkštėtų.
            9. Sutvirtėjusį varškės tinginį galima tiesiog raikyti ir skanauti, bet aš jį dar pauošiau karemelizuotais lazdyno riešutais (žr. patarimus žemiau) ir apšlaksčiau karamelės padažu. Papuošimams taip pat puikia tinka vien karamelė ar tirpintas šokoladas ar tiesiog kepinant obuolius tinginiui jų pasiruoškite daugiau ir dalį panaudokite tinginiui papuošti.',
            'user_id' => 1,
            'group_id' => 1,
        ]));

        $recipes->push(Recipe::create([
            'title' => 'Moliūgo želė desertas',
            'number_of_servings' => 4,
            'preparation_time' => 'Apie 30 minučių',
            'ingredients' => 
            '500 gramų moliūgų, 160 gramų želės (apelsinų arba citrinų), 150 gramų vandens, 1 vienetas apelsinų (didelio arba 2 mažesnių)',
            'instructions' => '1. Moliūgus supjaustyti vidutinio dydžio kubeliais. Į puodą pilti vandenį, sudėti moliūgus ir apvirti iki kol paminkštės. Tuomet apelsinus nulupti, supjaustyti, sudėti į puodą su moliūgais. Pavirti dar kelias minutes.
            2. Želė suberti į dubenį, užpilti vandeniu ir išmaišyti.
            3. Moliūgus su apelsinais elektriniu trintuvu sutrinti iki vientisos masės. Į paruoštą masę supilti želė, gerai išmaišyti, supilti į norimas formeles, dėti į šaldytuvą sustingti.',
            'user_id' => 1,
            'group_id' => 1,
        ]));

        $recipes->push(Recipe::create([
            'title' => 'Prancūziškas obouolių pyragas',
            'number_of_servings' => 15,
            'preparation_time' => 'Maždaug 1 valanda',
            'ingredients' => '250 g miltų, 50 g cukraus pudros, 40 g ryžių miltų, 200 g sviesto, obuolių, vandens',
            'instructions' => 'Instrukcijas galite rasti įraše',
            'user_id' => 2,
            'group_id' => 2,
        ]));

        $recipes->push(Recipe::create([
            'title' => 'Laravel prototipas',
            'number_of_servings' => 1,
            'preparation_time' => '3 geros darbo dienos',
            'ingredients' => '1 geras tutorialas, VS Code, pora maldelių',
            'instructions' => 'Instrukcijas galite rasti įrašuose',
            'user_id' => 10,
            'group_id' => 3,
        ]));

        // Create recordings
        $recordings = collect();

        $recordings->push(Recording::create([
            'title' => 'Varškės tinginys su obuoliais (be kondensuoto pieno)',
            'host_name' => 'Dovilė',
            'link' => 'https://www.youtube.com/watch?v=gTzKXV0Fw-c',
            'recipe_id' => 1,
        ]));

        $recordings->push(Recording::create([
            'title' => 'Beatos virtuvė',
            'host_name' => 'Beata Nicholson',
            'link' => 'https://www.lrt.lt/naujienos/gyvenimas/13/1268763/beatos-nicholson-virtuveje-tesiasi-obuoliu-fiesta-prancuziskas-pyragas-is-trapios-sluoksniuotos-teslos',
            'recipe_id' => 3,
        ]));

        $recordings->push(Recording::create([
            'title' => 'Laravel From Scratch 2022 | 4+ Hour Course',
            'host_name' => 'Traversy Media',
            'link' => 'https://www.youtube.com/watch?v=MYyJ4PuL4pY',
            'recipe_id' => 4,
        ]));

        $recordings->push(Recording::create([
            'title' => 'Wow ambience',
            'host_name' => 'Everness',
            'link' => 'https://www.youtube.com/watch?v=pWTSK5waNs8',
            'recipe_id' => 4,
        ]));
    }
}
