<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Project;
use Illuminate\Database\Seeder;

class BlogProjectSeeder extends Seeder
{
    public function run(): void
    {
        // ── Blogs ─────────────────────────────────────────────────────────────
        $blogs = [
            [
                'titleEN' => 'Storytelling in the Digital Age',
                'titleID' => 'Bercerita di Era Digital',
                'slugEN' => 'storytelling-in-the-digital-age',
                'slugID' => 'bercerita-di-era-digital',
                'contentEN' => "The internet has not killed storytelling — it has multiplied it. Where once a journalist commanded a single primetime slot or a broadsheet column, today's storyteller must simultaneously manage social snippets, long-form essays, short videos, and interactive data visualisations.\n\nWhat has changed most profoundly is the relationship between pace and depth. Breaking news moves in seconds, yet the demand for authoritative, nuanced analysis has never been higher.",
                'contentID' => "Internet tidak membunuh cara kita bercerita — ia memperbanyaknya. Jika dulu seorang jurnalis memimpin slot waktu utama di TV atau mendapat satu kolom di koran, kini para pencerita harus mengelola potongan video pendek di media sosial, esai panjang, dan visualisasi data yang interaktif seketika.",
                'thumbnail' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=900&h=500&fit=crop'],
                'tags' => ['storytelling', 'digital', 'journalism'],
                'created_at' => now()->subDays(1),
            ],
            [
                'titleEN' => 'The Art of Documentary Filmmaking',
                'titleID' => 'Seni Pembuatan Film Dokumenter',
                'slugEN' => 'the-art-of-documentary-filmmaking',
                'slugID' => 'seni-pembuatan-film-dokumenter',
                'contentEN' => "A documentary begins long before the camera rolls. It begins with a question the filmmaker cannot stop asking. In my experience, the difference between a forgettable film and an enduring one often lies not in production value but in the quality of curiosity driving the director.",
                'contentID' => "Film dokumenter dimulai jauh sebelum kamera mulai merekam. Prosesnya dimulai dari berbagai pertanyaan yang tak henti-henti diajukan oleh pembuat film. Menurut pengalaman saya, perbedaan antara film kelas dua dan film yang abadi bukan terletak pada nilai produksi.",
                'thumbnail' => 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1516280440614-37939bbacd81?w=900&h=500&fit=crop'],
                'tags' => ['documentary', 'filmmaking', 'production'],
                'created_at' => now()->subDays(5),
            ],
            [
                'titleEN' => 'Leadership in Modern Newsrooms',
                'titleID' => 'Kepemimpinan di Ruang Redaksi Modern',
                'slugEN' => 'leadership-in-modern-newsrooms',
                'slugID' => 'kepemimpinan-di-ruang-redaksi-modern',
                'contentEN' => "The modern newsroom is a high-stakes environment where the margin for error is thin and the expectations are unreasonably broad. A news leader must simultaneously hold editorial standards, manage team morale, respond to audience analytics, and plan months ahead.",
                'contentID' => "Ruang redaksi moden adalah lingkungan taruhan besar di mana margin kesalahan (margin error) kecil dan harapan publik begitu luas. Seorang pimpinan berita harus menyeimbangkan antara memegang teguh pedoman redaksional secara seragam.",
                'thumbnail' => 'https://images.unsplash.com/photo-1614267157481-ca2b81ac6fcc?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1614267157481-ca2b81ac6fcc?w=900&h=500&fit=crop'],
                'tags' => ['leadership', 'newsroom', 'media'],
                'created_at' => now()->subDays(10),
            ],
            [
                'titleEN' => 'Investigative Journalism Techniques',
                'titleID' => 'Teknik Jurnalisme Investigasi',
                'slugEN' => 'investigative-journalism-techniques',
                'slugID' => 'teknik-jurnalisme-investigasi',
                'contentEN' => "Investigative journalism is about digging deeper than the surface. It requires patience, meticulous research, and the courage to follow the trail of evidence wherever it may lead.",
                'contentID' => "Jurnalisme investigasi adalah tentang menggali lebih dalam dari sekadar permukaan. Ini membutuhkan kesabaran, penelitian yang teliti, dan keberanian untuk mengikuti jejak bukti.",
                'thumbnail' => 'https://images.unsplash.com/photo-1451187580459-434962b9c241?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1451187580459-434962b9c241?w=900&h=500&fit=crop'],
                'tags' => ['investigative', 'journalism', 'research'],
                'created_at' => now()->subDays(15),
            ],
            [
                'titleEN' => 'The Future of Radio and Podcasts',
                'titleID' => 'Masa Depan Radio dan Podcast',
                'slugEN' => 'future-of-radio-and-podcasts',
                'slugID' => 'masa-depan-radio-dan-podcast',
                'contentEN' => "Audio storytelling has seen a massive resurgence. From traditional radio to the boom of podcasts, the intimacy of the human voice continues to captivate audiences worldwide.",
                'contentID' => "Bercerita melalui audio telah mengalami kebangkitan besar. Dari radio tradisional hingga boominya podcast, keintiman suara manusia terus memikat audiens.",
                'thumbnail' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=900&h=500&fit=crop'],
                'tags' => ['audio', 'podcast', 'radio'],
                'created_at' => now()->subDays(20),
            ],
            [
                'titleEN' => 'Digital Ethics for Modern Media',
                'titleID' => 'Etika Digital untuk Media Modern',
                'slugEN' => 'digital-ethics-media',
                'slugID' => 'etika-digital-media',
                'contentEN' => "Navigating the digital landscape requires a strong ethical compass. Issues of privacy, data manipulation, and misinformation are at the forefront of modern media challenges.",
                'contentID' => "Menavigasi lanskap digital membutuhkan kompas etika yang kuat. Masalah privasi, manipulasi data, dan misinformasi adalah tantangan utama.",
                'thumbnail' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900&h=500&fit=crop'],
                'tags' => ['ethics', 'digital', 'media'],
                'created_at' => now()->subDays(25),
            ],
            [
                'titleEN' => 'Visual Storytelling in Photography',
                'titleID' => 'Bercerita Lewat Visual Fotografi',
                'slugEN' => 'visual-storytelling-photography',
                'slugID' => 'bercerita-visual-fotografi',
                'contentEN' => "A single image can tell a thousand stories. Capturing the essence of a moment requires not just technical skill, but an eye for emotion and composition.",
                'contentID' => "Satu gambar dapat menceritakan seribu kisah. Menangkap esensi dari sebuah momen tidak hanya membutuhkan keterampilan teknis.",
                'thumbnail' => 'https://images.unsplash.com/photo-1452784444945-3f422708bc34?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1452784444945-3f422708bc34?w=900&h=500&fit=crop'],
                'tags' => ['photography', 'visual', 'storytelling'],
                'created_at' => now()->subDays(30),
            ],
            [
                'titleEN' => 'Managing Crisis in Public Relations',
                'titleID' => 'Mengelola Krisis dalam PR',
                'slugEN' => 'crisis-management-pr',
                'slugID' => 'manajemen-krisis-pr',
                'contentEN' => "In the age of social media, a crisis can escalate in minutes. Effective PR management requires rapid response, transparency, and strategic communication.",
                'contentID' => "Di era media sosial, sebuah krisis dapat meningkat dalam hitungan menit. Manajemen PR yang efektif membutuhkan respon cepat.",
                'thumbnail' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1557804506-669a67965ba0?w=900&h=500&fit=crop'],
                'tags' => ['pr', 'crisis', 'management'],
                'created_at' => now()->subDays(35),
            ],
            [
                'titleEN' => 'The Rise of Citizen Journalism',
                'titleID' => 'Bangkitnya Jurnalisme Warga',
                'slugEN' => 'rise-of-citizen-journalism',
                'slugID' => 'bangkitnya-jurnalisme-warga',
                'contentEN' => "Every person with a smartphone is a potential reporter. Citizen journalism has democratized information, but it also brings challenges to traditional reporting.",
                'contentID' => "Setiap orang dengan smartphone adalah reporter potensial. Jurnalisme warga telah mendemokratisasi informasi.",
                'thumbnail' => 'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900&h=500&fit=crop'],
                'tags' => ['journalism', 'citizen', 'digital'],
                'created_at' => now()->subDays(40),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slugEN' => $blog['slugEN']], $blog);
        }

        // ── Categories ────────────────────────────────────────────────────────
        $categories = [
            ['id' => 1, 'nameID' => 'Dokumenter', 'nameEN' => 'Documentary', 'slugID' => 'dokumenter', 'slugEN' => 'documentary'],
            ['id' => 2, 'nameID' => 'Multimedia', 'nameEN' => 'Multimedia', 'slugID' => 'multimedia', 'slugEN' => 'multimedia'],
            ['id' => 3, 'nameID' => 'Konservasi', 'nameEN' => 'Conservation', 'slugID' => 'konservasi', 'slugEN' => 'conservation'],
        ];

        foreach ($categories as $catData) {
            \App\Models\ProjectCategory::updateOrCreate(['id' => $catData['id']], $catData);
        }

        // ── Projects ──────────────────────────────────────────────────────────
        $projects = [
            [
                'titleEN' => 'Raja Ampat Documentary',
                'titleID' => 'Dokumenter Raja Ampat',
                'slugEN' => 'raja-ampat-documentary',
                'slugID' => 'dokumenter-raja-ampat',
                'descriptionEN' => "A behind-the-scenes account of filming one of the world's most biodiverse marine ecosystems.",
                'descriptionID' => "Laporan di balik layar pengalaman menelusuri langsung salah satu ekosistem laut paling kaya.",
                'thumbnail' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=900&h=500&fit=crop'],
                'project_category_id' => 1,
                'created_at' => now()->subDays(2),
            ],
            [
                'titleEN' => 'Wildlife Conservation Series',
                'titleID' => 'Serial Konservasi Satwa Liar',
                'slugEN' => 'wildlife-conservation-series',
                'slugID' => 'serial-konservasi-satwa-liar',
                'descriptionEN' => "A seven-part documentary project covering critically endangered species.",
                'descriptionID' => "Film ini merupakan paket 7 seri dari proyek dokumenter untuk melindungi satwa.",
                'thumbnail' => 'https://images.unsplash.com/photo-1474511320723-9a56873867b5?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1474511320723-9a56873867b5?w=900&h=500&fit=crop'],
                'project_category_id' => 3,
                'created_at' => now()->subDays(7),
            ],
            [
                'titleEN' => 'Urban Voices',
                'titleID' => 'Suara Perkotaan',
                'slugEN' => 'urban-voices',
                'slugID' => 'suara-perkotaan',
                'descriptionEN' => "A multimedia project documenting the untold stories of Jakarta's informal sector workers.",
                'descriptionID' => "Mengusung proyek multimedia untuk mendata dokumentasi jejak rahasia kaum menengah ke bawah.",
                'thumbnail' => 'https://images.unsplash.com/photo-1555899434-94d1368aa7ae?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1555899434-94d1368aa7ae?w=900&h=500&fit=crop'],
                'project_category_id' => 2,
                'created_at' => now()->subDays(12),
            ],
            [
                'titleEN' => 'Hidden Bali',
                'titleID' => 'Bali Tersembunyi',
                'slugEN' => 'hidden-bali',
                'slugID' => 'bali-tersembunyi',
                'descriptionEN' => "Exploring the lesser-known parts of Bali, beyond the tourist traps.",
                'descriptionID' => "Menjelajahi bagian Bali yang kurang dikenal, di luar jebakan turis.",
                'thumbnail' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=900&h=500&fit=crop'],
                'project_category_id' => 1,
                'created_at' => now()->subDays(17),
            ],
            [
                'titleEN' => 'Sumatra Rainforest',
                'titleID' => 'Hutan Hujan Sumatra',
                'slugEN' => 'sumatra-rainforest',
                'slugID' => 'hutan-hujan-sumatra',
                'descriptionEN' => "Documenting the struggle to preserve the ancient rainforests of Sumatra.",
                'descriptionID' => "Mendokumentasikan perjuangan untuk melestarikan hutan hujan kuno Sumatra.",
                'thumbnail' => 'https://images.unsplash.com/photo-1582234033010-094191c9d640?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1582234033010-094191c9d640?w=900&h=500&fit=crop'],
                'project_category_id' => 3,
                'created_at' => now()->subDays(22),
            ],
            [
                'titleEN' => 'Jakarta Nightlife',
                'titleID' => 'Kehidupan Malam Jakarta',
                'slugEN' => 'jakarta-nightlife',
                'slugID' => 'kehidupan-malam-jakarta',
                'descriptionEN' => "A visual journey through the neon-lit streets of nocturnal Jakarta.",
                'descriptionID' => "Perjalanan visual melalui jalanan Jakarta yang diterangi lampu neon.",
                'thumbnail' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=900&h=500&fit=crop'],
                'project_category_id' => 2,
                'created_at' => now()->subDays(27),
            ],
            [
                'titleEN' => 'Komodo Island Expedition',
                'titleID' => 'Ekspedisi Pulau Komodo',
                'slugEN' => 'komodo-island',
                'slugID' => 'pulau-komodo',
                'descriptionEN' => "Filming the legendary dragons in their natural habitat.",
                'descriptionID' => "Merekam naga legendaris di habitat alami mereka.",
                'thumbnail' => 'https://images.unsplash.com/photo-1518002171953-a080ee817e1f?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1518002171953-a080ee817e1f?w=900&h=500&fit=crop'],
                'project_category_id' => 1,
                'created_at' => now()->subDays(32),
            ],
            [
                'titleEN' => 'Marine Life of Bunaken',
                'titleID' => 'Kehidupan Laut Bunaken',
                'slugEN' => 'bunaken-marine-life',
                'slugID' => 'kehidupan-laut-bunaken',
                'descriptionEN' => "Diving into the pristine waters of North Sulawesi.",
                'descriptionID' => "Menyelam ke perairan murni di Sulawesi Utara.",
                'thumbnail' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=900&h=500&fit=crop'],
                'project_category_id' => 3,
                'created_at' => now()->subDays(37),
            ],
            [
                'titleEN' => 'Modern Java',
                'titleID' => 'Jawa Modern',
                'slugEN' => 'modern-java',
                'slugID' => 'jawa-modern',
                'descriptionEN' => "A look at the evolving culture and landscapes of Java island.",
                'descriptionID' => "Melihat budaya dan lanskap Pulau Jawa yang terus berkembang.",
                'thumbnail' => 'https://images.unsplash.com/photo-1555899434-94d1368aa7ae?w=900&h=500&fit=crop',
                'images' => ['https://images.unsplash.com/photo-1555899434-94d1368aa7ae?w=900&h=500&fit=crop'],
                'project_category_id' => 2,
                'created_at' => now()->subDays(42),
            ],
        ];

        foreach ($projects as $projectData) {
            Project::updateOrCreate(['slugEN' => $projectData['slugEN']], $projectData);
        }
    }

}
