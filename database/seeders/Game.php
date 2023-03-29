<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Game extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $games = [
            [
                'id' => '1',
                'game_name' => 'Euro Truck Simulator 2',
                'description' => 'Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore, your endurance, skill and speed will all be pushed to their limits.',
                'long_description' => 'Join your friends and keep on truckin together in 8 player Convoy multiplayer mode, now available!',
                'category' => 'Simulation',
                'developer' => 'SCS Software',
                'publisher' => 'SCS Software',
                'price' => '170000',
                'created_at' => Carbon::create('2012', '10', '18'),
                'cover' => 'truck.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256827292/movie480_vp9.webm?t=1616622379',
                'adult' => false,
            ],
            [
                'id' => '2',
                'game_name' => 'Apex Legends',
                'description' => 'Apex Legends is the award-winning, free-to-play Hero shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.',
                'long_description' => 'Master an ever-growing roster of diverse Legends, deep tactical squad play and bold new innovations that go beyond the Battle Royale experience—all within a rugged world where anything goes. Welcome to the next evolution of Hero Shooter.',
                'category' => 'Action',
                'developer' => 'Respawn Entertainment',
                'publisher' => 'Electronic Arts',
                'price' => '0',
                'created_at' => Carbon::create('2020', '11', '5'),
                'cover' => 'apex.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256832561/movie480_vp9.webm?t=1619624593',
                'adult' => false,
            ],
            [
                'id' => '3',
                'game_name' => 'Forza Horizon 4',
                'description' => 'Dynamic seasons change everything at the world’s greatest automotive festival. Go it alone or team up with others to explore beautiful and historic Britain in a shared open world.',
                'long_description' => 'Dynamic seasons change everything at the world’s greatest automotive festival. Go it alone or team up with others to explore beautiful and historic Britain in a shared open world. Collect, modify and drive over 450 cars. Race, stunt, create and explore – choose your own path to become a Horizon Superstar.',
                'category' => 'Sport',
                'developer' => 'Playground Games',
                'publisher' => 'Xbox Game Studios',
                'price' => '700000',
                'created_at' => Carbon::create('2021', '3', '10'),
                'cover' => 'forza.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256820720/movie480_vp9.webm?t=1612810706',
                'adult' => false,
            ],
            [
                'id' => '4',
                'game_name' => 'Grand Theft Auto V',
                'description' => 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.',
                'long_description' => 'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.

                Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.

                The game offers players a huge range of PC-specific customization options, including over 25 separate configurable settings for texture quality, shaders, tessellation, anti-aliasing and more, as well as support and extensive customization for mouse and keyboard controls. Additional options include a population density slider to control car and pedestrian traffic, as well as dual and triple monitor support, 3D compatibility, and plug-and-play controller support.

                Grand Theft Auto V for PC also includes Grand Theft Auto Online, with support for 30 players and two spectators. Grand Theft Auto Online for PC will include all existing gameplay upgrades and Rockstar-created content released since the launch of Grand Theft Auto Online, including Heists and Adversary modes.

                The PC version of Grand Theft Auto V and Grand Theft Auto Online features First Person Mode, giving players the chance to explore the incredibly detailed world of Los Santos and Blaine County in an entirely new way.

                Grand Theft Auto V for PC also brings the debut of the Rockstar Editor, a powerful suite of creative tools to quickly and easily capture, edit and share game footage from within Grand Theft Auto V and Grand Theft Auto Online. The Rockstar Editor’s Director Mode allows players the ability to stage their own scenes using prominent story characters, pedestrians, and even animals to bring their vision to life. Along with advanced camera manipulation and editing effects including fast and slow motion, and an array of camera filters, players can add their own music using songs from GTAV radio stations, or dynamically control the intensity of the game’s score. Completed videos can be uploaded directly from the Rockstar Editor to YouTube and the Rockstar Games Social Club for easy sharing.

                Soundtrack artists The Alchemist and Oh No return as hosts of the new radio station, The Lab FM. The station features new and exclusive music from the production duo based on and inspired by the game’s original soundtrack. Collaborating guest artists include Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike, Sam Herring from Future Islands, and more. Players can also discover Los Santos and Blaine County while enjoying their own music through Self Radio, a new radio station that will host player-created custom soundtracks.',
                'category' => 'Action',
                'developer' => 'Rockstar North',
                'publisher' => 'Rockstar Games',
                'price' => '200000',
                'created_at' => Carbon::create('2015', '4', '14'),
                'cover' => 'gta.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256757115/movie480.webm?t=1563930864',
                'adult' => true,
            ],
            [
                'id' => '5',
                'game_name' => 'GTFO',
                'description' => 'GTFO is an extreme cooperative horror shooter that throws you from gripping suspense to explosive action in a heartbeat. Stealth, strategy, and teamwork are necessary to survive in your deadly, underground prison. Work together or die together.',
                'long_description' => 'Your team of prisoners is dropped into the Rundown when a new Work Order is issued by the Warden, the mysterious entity holding you captive. The Rundown is a series of expeditions, each one taking you deeper into a decayed research facility called the Complex. You descend level by level, scavenging tools and resources that help you survive in a perilous network of tunnels where gruesome creatures lurk in every shadow. Complete all of the expeditions to fulfill the Work Order and clear the Rundown.',
                'category' => 'Action',
                'developer' => '10 Chambers',
                'publisher' => '10 Chambers',
                'price' => '500000',
                'created_at' => Carbon::create('2021', '12', '10'),
                'cover' => 'gtfo.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256832724/movie480_vp9.webm?t=1619710158',
                'adult' => true,
            ],
            [
                'id' => '6',
                'game_name' => 'It Takes Two',
                'description' => 'Embark on the craziest journey of your life in It Takes Two. Invite a friend to join for free with Friend’s Pass and work together across a huge variety of gleefully disruptive gameplay challenges. Winner of GAME OF THE YEAR at the Game Awards 2021.',
                'long_description' => 'Embark on the craziest journey of your life in It Takes Two, a genre-bending platform adventure created purely for co-op. Invite a friend to join for free with Friend’s Pass and work together across a huge variety of gleefully disruptive gameplay challenges. Play as the clashing couple Cody and May, two humans turned into dolls by a magic spell. Together, trapped in a fantastical world where the unpredictable hides around every corner, they are reluctantly challenged with saving their fractured relationship.',
                'category' => 'Adventure',
                'developer' => 'Hazelight',
                'publisher' => 'Electronic Arts',
                'price' => '430000',
                'created_at' => Carbon::create('2021', '3', '26'),
                'cover' => 'itt.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256827093/movie480_vp9.webm?t=1616514535',
                'adult' => false,
            ],
            [
                'id' => '7',
                'game_name' => 'Monster Hunter World',
                'description' => 'Welcome to a new world! In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.',
                'long_description' => 'Welcome to a new world! Take on the role of a hunter and slay ferocious monsters in a living, breathing ecosystem where you can use the landscape and its diverse inhabitants to get the upper hand. Hunt alone or in co-op with up to three other players, and use materials collected from fallen foes to craft new gear and take on even bigger, badder beasts!',
                'category' => 'Action',
                'developer' => 'CAPCOM Co., Ltd.',
                'publisher' => 'CAPCOM Co., Ltd.',
                'price' => '335000',
                'created_at' => Carbon::create('2018', '8', '9'),
                'cover' => 'mhw.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256769022/movie480.webm?t=1596524406',
                'adult' => true,
            ],
            [
                'id' => '8',
                'game_name' => 'Planet Coaster',
                'description' => 'Planet Coaster® - the future of coaster park simulation games has arrived! Surprise, delight and thrill incredible crowds as you build your coaster park empire - let your imagination run wild, and share your success with the world.',
                'long_description' => 'Surprise, delight and thrill crowds as you build the theme park of your dreams. Build and design incredible coaster parks with unparalleled attention to detail and manage your park in a truly living world.',
                'category' => 'Simulation',
                'developer' => 'Frontier Developments, Aspyr (Mac)',
                'publisher' => 'Frontier Developments, Aspyr (Mac)',
                'price' => '583000',
                'created_at' => Carbon::create('2016', '11', '17'),
                'cover' => 'coaster.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256674785/movie480.webm?t=1488290537',
                'adult' => false,
            ],
            [
                'id' => '9',
                'game_name' => 'Tekken 7',
                'description' => 'Discover the epic conclusion of the long-time clan warfare between members of the Mishima family. Powered by Unreal Engine 4, the legendary fighting game franchise fights back with stunning story-driven cinematic battles and intense duels that can be enjoyed with friends and rivals.',
                'long_description' => 'Discover the epic conclusion of the Mishima clan and unravel the reasons behind each step of their ceaseless fight. Powered by Unreal Engine 4, TEKKEN 7 features stunning story-driven cinematic battles and intense duels that can be enjoyed with friends and rivals alike through innovative fight mechanics.',
                'category' => 'Action',
                'developer' => 'BANDAI NAMCO',
                'publisher' => 'BANDAI NAMCO',
                'price' => '420000',
                'created_at' => Carbon::create('2017', '6', '2'),
                'cover' => 'tekken.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256807403/movie480_vp9.webm?t=1604043392',
                'adult' => false,
            ],
            [
                'id' => '10',
                'game_name' => 'Terraria',
                'description' => 'Dig, fight, explore, build! Nothing is impossible in this action-packed adventure game. Four Pack also available!',
                'long_description' => 'Dig, Fight, Explore, Build: The very world is at your fingertips as you fight for survival, fortune, and glory. Will you delve deep into cavernous expanses in search of treasure and raw materials with which to craft ever-evolving gear, machinery, and aesthetics? Perhaps you will choose instead to seek out ever-greater foes to test your mettle in combat? Maybe you will decide to construct your own city to house the host of mysterious allies you may encounter along your travels?',
                'category' => 'Action',
                'developer' => 'Re-Logic',
                'publisher' => 'Re-Logic',
                'price' => '90000',
                'created_at' => Carbon::create('2011', '5', '7'),
                'cover' => 'terraria.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256785003/movie480_vp9.webm?t=1589654781',
                'adult' => false,
            ],
            [
                'id' => '11',
                'game_name' => 'Totally Accurate Battle Simulator',
                'description' => 'Be the leader of wobblers from ancient lands, spooky places, and fantasy worlds. Watch them fight in simulations made with the wobbliest physics system ever created, make your own wobblers in the unit creator and send your army off to fight your friends in multiplayer.',
                'long_description' => 'Be the leader of red and blue wobblers from ancient lands, spooky places, and fantasy worlds. Watch them fight in simulations made with the wobbliest physics system ever created.',
                'category' => 'Simulation',
                'developer' => 'Landfall',
                'publisher' => 'Landfall',
                'price' => '110000',
                'created_at' => Carbon::create('2021', '4', '2'),
                'cover' => 'tabs.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256828204/movie480_vp9.webm?t=1617300058',
                'adult' => false,
            ],
            [
                'id' => '12',
                'game_name' => 'Valheim',
                'description' => 'A brutal exploration and survival game for 1-10 players, set in a procedurally-generated purgatory inspired by viking culture. Battle, build, and conquer your way to a saga worthy of Odin’s patronage!',
                'long_description' => 'Valheim is a brutal exploration and survival game for 1-10 players set in a procedurally-generated world inspired by Norse mythology. Craft powerful weapons, construct longhouses, and slay mighty foes to prove yourself to Odin!',
                'category' => 'Survival',
                'developer' => 'Iron Gate AB',
                'publisher' => 'Coffee Stain Publishing',
                'price' => '110000',
                'created_at' => Carbon::create('2021', '2', '2'),
                'cover' => 'valheim.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256820008/movie480_vp9.webm?t=1612278985',
                'adult' => false,
            ],
            [
                'id' => '13',
                'game_name' => 'Tom Clancy\'s Rainbow Six® Siege',
                'description' => 'Tom Clancy\'s Rainbow Six Siege is the latest installment of the acclaimed first-person shooter franchise developed by the renowned Ubisoft Montreal studio.',
                'long_description' => 'Master the art of destruction and gadgetry in Tom Clancy\'s Rainbow Six Siege. Face intense close quarters combat, high lethality, tactical decision making, team play and explosive action within every moment. Experience a new era of fierce firefights and expert strategy born from the rich legacy of past Tom Clancy\'s Rainbow Six games.',
                'category' => 'Action',
                'developer' => 'Ubisoft Montreal',
                'publisher' => 'Ubisoft',
                'price' => '205000',
                'created_at' => Carbon::create('2015', '12', '2'),
                'cover' => 'r6.jpg',
                'trailer' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/256806810/movie480_vp9.webm?t=1603820794',
                'adult' => true,
            ]

        ];
        DB::table('games')->insert($games);
    }
}
