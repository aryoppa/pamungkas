@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5">
    @if (isset($_GET['type']))
    @if ($_GET['type'] == "error-identification")
    <div class="row">
        <h2 class="text-color-primary pt-3">
            <b>
                Error Identification
            </b>
        </h2>
        <p class="pt-4" style="text-align: justify;">
            Error identification merupakan salah satu jenis soal yang paling sering muncul di
            ujian-ujian Bahasa Inggris. Pada tipe soal ini, seseorang akan diminta untuk
            mengidentifikasi kesalahan atau kesalahan dalam sebuah teks, seperti tata bahasa,
            ejaan, atau penggunaan kata yang tidak tepat. Dalam tes bahasa Inggris, siswa mungkin
            diminta untuk mengidentifikasi kesalahan dalam kalimat tertentu dan memilih opsi yang
            benar untuk memperbaikinya. Tujuan dari tipe soal ini adalah untuk membantu seseorang
            meningkatkan kemampuan bahasa mereka dengan mengidentifikasi dan memperbaiki kesalahan
            dalam tulisan mereka atau bahasa mereka secara keseluruhan.
            berikut adalah beberapa contoh soal error identification yang dibuat oleh sistem SmartEngTest:
        </p>
        <ol class="ps-4 ms-1">
            <b style="margin-left: -16px;">
                Passage: WWF: Hundreds of newly discovered species under threat in Southeast Asia's Mekong region <br>
            </b>
            <li>
                "These remarkable species may be new to science but they have survived and evolved in the Greater Mekong region for millions of years, reminding us humans that they were there a very long time before our species moved into this region," said K. Yoganand, WWF's Greater Mekong regional wildlife lead.
            </li>
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    species
                </li>
                <li>
                    survived
                </li>
                <li>
                    region
                </li>
                <li>
                    reminding
                </li>
            </ul>
            <span class="ps-0 ms-0">
                Jawaban: region--neighborhood
            </span>
            <br><br>
            <b style="margin-left: -16px;">
                Passage: WDutch intelligence warned CIA about alleged Ukrainian plot to attack Nord Stream pipelines, Netherlands’ public broadcaster reports <br>
            </b>
            <li>
                The CIA received the tip from Dutch military intelligence, the officials told the WSJ.
            </li>
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    received
                </li>
                <li>
                    dutch
                </li>
                <li>
                    officials
                </li>
                <li>
                    told
                </li>
            </ul>
            <span class="ps-0 ms-0">
                Jawaban: received--receive
            </span>
        </ol>
    </div>
    @elseif ($_GET['type'] == "vocabulary")
    <div class="row">
        <h2 class="text-color-primary pt-3">
            <b>
                Vocabulary
            </b>
        </h2>
        <p class="pt-4" style="text-align: justify;">
            Vocabulary merupakan jenis pertanyaan yang meminta seseorang untuk memahami atau
            menggunakan kata-kata tertentu dalam konteks tertentu.
            Dalam tes bahasa Inggris, siswa mungkin diminta untuk menentukan arti
            kata yang tidak biasa atau kata yang jarang digunakan dalam suatu kalimat.
            Pada ujian masuk perguruan tinggi, siswa mungkin diminta untuk memilih kata yang
            paling tepat untuk melengkapi kalimat yang diberikan. <br>
            Beberapa jenis soal vocabulary antara lain:
        </p>
        <ul class="ps-4 ms-1">
            <li>
                Sinonim: meminta seseorang untuk memilih kata yang memiliki arti yang sama atau mirip dengan kata tertentu.
            </li>
            <li>
                Antonim: meminta seseorang untuk memilih kata yang memiliki arti yang berlawanan dengan kata tertentu.
            </li>
            <li>
                Menentukan arti kata dalam konteks: meminta seseorang untuk menentukan arti kata yang digunakan dalam kalimat tertentu.
            </li>
            <li>
                Menemukan kata yang tepat: meminta seseorang untuk memilih kata yang paling tepat untuk melengkapi kalimat yang diberikan.
            </li>
            <li>
                Kata tak biasa atau jarang digunakan: meminta seseorang untuk menentukan arti kata yang tidak biasa atau jarang digunakan dalam bahasa sehari-hari.
            </li>
        </ul>
        <p>
            Tujuan dari tipe soal vocabulary adalah untuk membantu seseorang meningkatkan kosa kata mereka dalam bahasa tertentu dan dapat menggunakan kata-kata yang tepat dalam konteks yang tepat.
            berikut adalah beberapa contoh soal vocabulary yang dibuat oleh sistem SmartEngTest: <br> <br>
        </p>
        <p>
            <strong>Passage:</strong> <br>
            CNN —Officials are in a race against time to find a civilian submersible that had five people aboard after it went missing Sunday in the North Atlantic while voyaging to the wreckage of the Titanic. The Canadian research ship Polar Prince on Sunday <span><b> notified </b></span> the military branch it had lost contact with the underwater vessel, according to Coast Guard spokesperson Lt. Samantha Corcoran. The Polar Prince, the vessel transported the missing submersible to the North Atlantic Ocean. The Polar Prince and the Air National Guard’s 106th Rescue Wing would continue surface searches through the evening, according to the Coast Guard. OceanGate's submersible, named the Titan, can hold up to five people on a dive to the bottom of the ocean.
        </p>
        <p>
            <strong>Question:</strong> <br>
        </p>
        <ol class="ps-4 ms-1">
            <li>
                Which of the following answer choices is closest in meaning to the word notified?
            </li>
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    give_notice
                </li>
                <li>
                    notify
                </li>
                <li>
                    send_word
                </li>
                <li>
                    give_notice
                </li>
            </ul>
            <span class="ps-0 ms-0">
                Jawaban: A
            </span>
        </ol>
        <p>
            <strong>Passage:</strong> <br>
            CNN —Two American citizens were found dead Tuesday in a hotel room in Mexico, a US State Department spokesperson said. They have been identified as 28-year-old Abby Lutz and her boyfriend, 41-year-old John Heathco, by Lutz’s stepsister, Gabrielle Slate. The couple was <span><b>discovered</b></span> in the Mexican resort village of El Pescadero in Baja California Sur state, a statement from the state attorney general’s office said. Slate told CNN she talked to her stepsister earlier this week during the couple’s vacation and said Lutz and Heathco thought they had gotten food poisoning. Abby Lutz has been identified by her stepsister as one of the Americans found dead in Mexico hotel room.
        </p>
        <p>
            <strong>Question:</strong> <br>
        </p>
        <ol class="ps-4 ms-1">
            <li>
                The word discovered in the passage is closest in meaning to…
            </li>
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    happen
                </li>
                <li>
                    find
                </li>
                <li>
                    unwrap
                </li>
                <li>
                    chance
                </li>
            </ul>
            <span class="ps-0 ms-0">
                Jawaban: C
            </span>
        </ol>
    </div>
    @elseif ($_GET['type'] == "sentence-completion")
    <div class="row">
        <h2 class="text-color-primary pt-3">
            <b>
                Sentence Completion
            </b>
        </h2>
        <p class="pt-4" style="text-align: justify;">
            Sentence completion merupakan tipe soal yang meminta seseorang untuk melengkapi
            bagian yang hilang dalam kalimat yang diberikan.
            Dalam tes bahasa Inggris, siswa mungkin diminta untuk melengkapi kalimat dengan
            kata yang paling tepat untuk membuat kalimat menjadi sempurna. <br>
            Beberapa jenis soal sentence completion antara lain:
        </p>
        <ul class="ps-4 ms-1">
            <li>
                Mengidentifikasi bagian kalimat yang hilang: meminta seseorang untuk mengidentifikasi bagian kalimat yang hilang dan melengkapi kalimat dengan kata yang tepat.
            </li>
            <li>
                Melengkapi kalimat dengan kata yang tepat: meminta seseorang untuk melengkapi kalimat dengan kata yang paling tepat untuk membuat kalimat menjadi sempurna.
            </li>
            <li>
                Melengkapi kalimat dengan frasa yang tepat: meminta seseorang untuk melengkapi kalimat dengan frasa yang paling tepat untuk membuat kalimat menjadi sempurna.
            </li>
        </ul>
        <p>
            Tujuan dari tipe soal sentence completion adalah untuk membantu seseorang meningkatkan pemahaman mereka tentang struktur kalimat dan kemampuan mereka dalam menggunakan kata-kata atau frasa yang tepat untuk membuat kalimat yang sempurna. <br><br>
            berikut adalah beberapa contoh soal sentence completion yang dibuat oleh sistem SmartEngTest:
        </p>
        <p>
            <strong>Question:</strong> <br>
        </p>
        <ol class="ps-4 ms-1">
            <li>
                Britain's King Charles III poses for ... portrait in Buckingham Palace's Throne Room dressed in full regalia.
            </li>
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    except
                </li>
                <li>
                    a
                </li>
                <li>
                    above
                </li>
                <li>
                    beneath
                </li>
            </ul>
            <span class="ps-0 ms-0">
                Jawaban: B
            </span>
        </ol>
        <ol class="ps-4 ms-1">
            <li>
                He is wearing the Robe ... Estate and the Imperial State Crown while holding the Sovereign's Orb and the Sovereign's Sceptre with Cross.
            </li>
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    during
                </li>
                <li>
                    of
                </li>
                <li>
                    among
                </li>
                <li>
                    around
                </li>
            </ul>
            <span class="ps-0 ms-0">
                Jawaban: B
            </span>
        </ol>
    </div>
    @elseif ($_GET['type'] == "5W1H")
    <div class="row">
        <h2 class="text-color-primary pt-3">
            <b>
                5W + 1H
            </b>
        </h2>
        <p class="pt-4" style="text-align: justify;">
            5W+1H merupakan tipe soal yang meminta seseorang untuk menjawab enam pertanyaan dasar,
            yaitu what (apa), when (kapan), where (di mana), why (mengapa), who (siapa), dan
            how (bagaimana) dalam sebuah teks atau informasi yang diberikan.
            Dalam suatu tes Bahasa Inggris, siswa mungkin diminta untuk membaca sebuah teks dan
            menjawab pertanyaan 5W+1H untuk memastikan pemahaman yang benar atas teks tersebut. <br>
            Beberapa contoh tipe soal 5W+1H antara lain:
        </p>
        <ul class="ps-4 ms-1">
            <li>
                Menjawab pertanyaan apa (what) dari sebuah teks: meminta seseorang untuk mengidentifikasi informasi atau objek apa yang dibahas dalam sebuah teks.
            </li>
            <li>
                Menjawab pertanyaan kapan (when) dari sebuah teks: meminta seseorang untuk mengidentifikasi waktu atau tanggal acara atau kejadian yang dibahas dalam sebuah teks.
            </li>
            <li>
                Menjawab pertanyaan di mana (where) dari sebuah teks: meminta seseorang untuk mengidentifikasi lokasi atau tempat acara atau kejadian yang dibahas dalam sebuah teks.
            </li>
            <li>
                Menjawab pertanyaan mengapa (why) dari sebuah teks: meminta seseorang untuk mengidentifikasi alasan atau tujuan di balik acara atau kejadian yang dibahas dalam sebuah teks.
            </li>
            <li>
                Menjawab pertanyaan siapa (who) dari sebuah teks: meminta seseorang untuk mengidentifikasi individu atau kelompok yang terlibat dalam acara atau kejadian yang dibahas dalam sebuah teks.
            </li>
            <li>
                Menjawab pertanyaan bagaimana (how) dari sebuah teks: meminta seseorang untuk mengidentifikasi cara atau proses acara atau kejadian yang dibahas dalam sebuah teks terjadi.
            </li>
        </ul>
        <p>
            Tujuan dari tipe soal 5W+1H adalah untuk membantu seseorang memahami informasi secara komprehensif dan mengembangkan kemampuan mereka dalam menganalisis teks atau informasi secara kritis.
            berikut adalah beberapa contoh soal 5W+1H yang dibuat oleh sistem SmartEngTest:
        </p>
        <p>
            <strong>Passage:</strong> <br>
            More than two million Indians have now tested positive for Covid-19, according to official figures. The country
            confirmed the last million cases in just 20 days, faster than the US or Brazil which have higher numbers. Testing has
            been expanded considerably in India in recent weeks but the situation varies across states. Spurred by a low death
            rate, the nation continues to reopen even as new hotspots drive the surge in cases. But some states have imposed
            restrictions. The recent measures include local, intermittent lockdowns, sometimes limiting activity in specific cities or
            districts. India is now the third country to cross the two million mark. It reported 62,170 cases in the past 24 hours,
            taking its total tally up to 2,025,409. The country has reported around 40,700 deaths so far. While that is the world's
            fifth-biggest total, experts say it is not very high given the country's population of 1.3 billion. The government,
            however, has been accused of undercounting Covid-19 deaths due to a variety of reasons - from lags in reporting to
            rules on how India determines if a death was caused by the virus. Meanwhile, India has been steadily "unlocking" its
            economy since early June after a gruelling lockdown that lasted nearly two months. Gyms and fitness centres are the
            latest to reopen. Testing has also gone up but it remains patchy as some states are doing as many as 40,000 test per
            million, and others as few as 6,000. Case numbers are rising rapidly, for instance, in the southern state of Andhra
            Pradesh. It shot up the list this past month, and now accounts for India's third-highest caseload. India, as one expert
            told me, was a "slow burning coil" for a long time when it came to the spread of the coronavirus. In that sense, it was
            different from the US and Brazil, the two other big countries badly hit by the pandemic. Now it has taken 20 days for
            the country to progress from a million to two million cases. That is faster than the time the US (43 days) and Brazil
            (27 days) took to double from a million cases. However, India has recorded fewer fatalities than both these countries.
            India is also generating the highest number of daily new cases in the world. What is making it difficult to contain the
            infection is the country's size, population and heterogeneity. In what has become a "patchwork pandemic", infections
            are waxing and waning in different states at different points. The success in containing the infection in the Dharavi
            slum in Mumbai and the capital, Delhi, show that India is not defenceless against the virus. But India needs to realise
            that it needs a more robust federal strategy to contain a virus that is going to stay with us for a long time, experts say.
            The country needs to bring together "public health, health care, social support and financial sectors together" with
            strong political leadership at every level to forge a national containment strategy, says epidemiologist Bhramar
            Mukherjee
        </p>
        <p>
            <strong>Question:</strong> <br>
        </p>
        <ol class="ps-4 ms-1">
            <li>
                What country is today the 3rd country after crossing the two million mark?
            </li>
            <li>
                What country is also getting the highest number of daily newly cases in the world?
            </li>
            <li>
                How many Indians have today proved positive for Covid19 agreeing to official figures?
            </li>
            <span class="ps-0 ms-0">
                Jawaban:
            </span>
            <ol class="ps-0 ms-3">
                <li>
                    India
                </li>
                <li>
                    India
                </li>
                <li>
                    More than two million
                </li>
            </ol>
        </ol>
    </div>
    @elseif ($_GET['type'] == "pronoun")
    <div class="row">
        <h2 class="text-color-primary pt-3">
            <b>
                Pronoun
            </b>
        </h2>
        <p class="pt-4" style="text-align: justify;">
            Pronoun merupakan tipe soal yang meminta seseorang untuk mengidentifikasi atau
            memilih kata ganti yang tepat untuk menggantikan kata benda tertentu dalam sebuah kalimat.
            Tipe soal pronoun sering ditemukan dalam tes bahasa Inggris dan bertujuan untuk
            menguji pemahaman seseorang terhadap penggunaan kata ganti atau pronoun dalam kalimat.
            Dalam tes ini, seseorang mungkin diminta untuk mengidentifikasi kata ganti yang tepat
            untuk menggantikan kata benda tertentu atau untuk menentukan referensi yang tepat dari
            kata ganti yang digunakan dalam suatu kalimat.<br>
            Beberapa contoh tipe soal pronoun antara lain:
        </p>
        <ul class="ps-4 ms-1">
            <li>
                Memilih kata ganti yang tepat: meminta seseorang untuk memilih kata ganti yang paling tepat untuk menggantikan kata benda tertentu dalam kalimat. </li>
            <li>
                Menentukan referensi kata ganti: meminta seseorang untuk menentukan referensi yang tepat dari kata ganti yang digunakan dalam suatu kalimat. </li>
            <li>
                Menentukan jenis kata ganti: meminta seseorang untuk menentukan jenis kata ganti yang digunakan dalam suatu kalimat, seperti personal pronoun, possessive pronoun, demonstrative pronoun, atau reflexive pronoun. </li>
        </ul>
        <p>
            Tujuan dari tipe soal pronoun adalah untuk membantu seseorang meningkatkan pemahaman mereka tentang penggunaan pronoun dalam bahasa Inggris dan dapat menggunakan pronoun dengan benar dalam konteks yang tepat.
            berikut adalah beberapa contoh soal pronoun yang dibuat oleh sistem SmartEngTest:
        </p>
    </div>
    @elseif ($_GET['type'] == "summary")
    <div class="row">
        <h2 class="text-color-primary pt-3">
            <b>
                Summary
            </b>
        </h2>
        <p class="pt-4" style="text-align: justify;">
            Tipe soal summary adalah jenis pertanyaan yang meminta seseorang untuk membuat
            ringkasan atau gambaran umum dari suatu teks atau bacaan yang diberikan.
            Tipe soal summary sering ditemukan dalam tes bahasa Inggris, khususnya tes
            pemahaman bacaan atau listening, dan bertujuan untuk menguji kemampuan seseorang
            dalam mengenali informasi penting dan membuat ringkasan yang tepat dari teks yang diberikan.
            Beberapa contoh tipe soal summary antara lain:
        </p>
        <ul class="ps-4 ms-1">
            <li>
                Menyimpulkan teks: meminta seseorang untuk membuat ringkasan dari teks atau bacaan yang diberikan.
            </li>
            <li>
                Menyimpulkan paragraf: meminta seseorang untuk membuat ringkasan dari sebuah paragraf dalam teks atau bacaan yang diberikan.
            </li>
            <li>
                Menentukan informasi penting: meminta seseorang untuk mengidentifikasi informasi penting dalam teks atau bacaan yang diberikan.
            </li>
        </ul>
        <p>
            Tujuan dari tipe soal summary adalah untuk membantu seseorang meningkatkan kemampuan mereka dalam memahami informasi secara cepat dan efektif, serta membuat ringkasan yang tepat dari teks yang diberikan. Kemampuan ini sangat penting dalam kehidupan sehari-hari, terutama dalam membaca berbagai jenis teks seperti buku, artikel, atau laporan kerja.
            berikut adalah beberapa contoh soal summary yang dibuat oleh sistem SmartEngTest:
        </p>
        <p>
            <strong>Passage:</strong> <br>
            Substitute goalkeeper Redmayne the hero for Australia who sealed their World Cup place for the fifth ____ time.
            Australia's ____ goalkeeper Andrew Redmayne saved the last penalty to secure his country a place at this year’s
            World Cup in Qatar as they edged Peru 5-4 in a shoot-out following a 0-0 draw after extra time in an intercontinental
            qualifying playoff on Monday. The ____, 42nd in the world rankings, claimed their sixth ticket to the World Cup and a
            Group D opening match against defending champions France on November 22.
        </p>
        <p>
            <strong>Question:</strong> <br>
        </p>
        <ol class="ps-4 ms-1">
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    losers
                </li>
                <li>
                    successes
                </li>
                <li>
                    replaces
                </li>
                <li>
                    consecutive
                </li>
                <li>
                    replace
                </li>
            </ul>
        </ol>
        <p>
            <strong>Passage:</strong> <br>
            From the section Burnley Vincent Kompany won 89 caps for Belgium Burnley have appointed ____ Manchester City
            captain Vincent Kompany as manager. The Belgian, 36, was Anderlecht boss for two years before leaving by mutual
            consent in May, having led them to ____ in the Belgian top flight. Former Belgium defender Kompany ____ 11 years
            at City, where he won 10 major trophies, including four Premier League titles.
        </p>
        <p>
            <strong>Question:</strong> <br>
        </p>
        <ol class="ps-4 ms-1">
            <ul class="ps-2 ms-2" style="list-style-type: upper-alpha">
                <li>
                    pierce
                </li>
                <li>
                    expended
                </li>
                <li>
                    erstwhile
                </li>
                <li>
                    expensed
                </li>
                <li>
                    tierce
                </li>
            </ul>
        </ol>
    </div>
    @endif
    @endif
    <div class="row">  
        <div class="col">
            <div class="my-5 float-right text-center">
                <div class="row">
                    <p>
                        Bukan tipe soal yang Anda cari?
                    </p>
                </div>
                <div class="row">
                    <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn bg-color-secondary text-white fw-bold">Kembali</a>
                </div>
            </div>
        </div>
        <div class="col-5">
        </div>
        <div class="col">
            <div class="my-5 float-right text-center">
                <div class="row">
                    <p>
                        Sesuai dengan tipe soal yang Anda cari?
                    </p>
                </div>
                <div class="row">
                    @if(Auth::check())
                    <a href="/generate" class="btn bg-color-primary text-white fw-bold">Buat Soal Sekarang!</a>
                    @else
                    <a href="/demo/generate" class="btn bg-color-primary text-white fw-bold">Demo Buat Soal Sekarang!</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
