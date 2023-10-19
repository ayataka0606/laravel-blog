<x-user-layout>
    <x-slot:description>AYATAKAのプロフィールページです。</x-slot:description>
    <x-slot:keywords>AYATAKA,プロフィール</x-slot:keywords>
    <x-slot:title>AYATAKA | ABOUT</x-slot:title>
    <figure class="flex justify-center">
        <img src="{{asset("storage/avatar.jpg")}}" alt="プロフィール画像" width="400">
    </figure>
    <section>
        <x-section-title>自己紹介</x-section-title>
        <article class="prose m-auto lg:text-lg">
            <p>
                AYATAKAと申します。1993年1月生まれで出身は岐阜県です。
                現在は結婚して愛知県に住んでいます。
            </p>
            <p>
                大学院でプログラミング言語のPythonを軽くさわり、プログラミングの魅力にはまってしまいました。
                大学院卒業後は、プログラミングとは関係のない仕事に就きましたが、
                やはり大好きなプログラミングを仕事にしたいと思い、現在転職活動中です。
                このサイトをLaravelというPHPフレームワークを使っていちから作成しました。
            </p>
        </article>
    </section>
    <section>
        <x-section-title>保有資格</x-section-title>
        <article class="prose m-auto">
            <ul class="lg:text-lg">
                <li>パスポート試験 合格 (2019年4月)</li>
                <li>情報セキュリティマネジメント試験 合格 (2019年11月)</li>
                <li>基本情報技術者試験 合格 (2023年8月)</li>
                <li>応用情報技術者試験 結果待ち (2023年10月)</li>
                <li>ネットワークスペシャリスト試験 受験予定 (2024年4月)</li>
            </ul>
        </article>
    </section>
    <section>
        <x-section-title>スキル</x-section-title>
        <article class="prose m-auto">
            <ul class="lg:text-lg">
                <li>HTML</li>
                <li>CSS</li>
                <li>Tailwind CSS</li>
                <li>JavaScript</li>
                <li>PHP</li>
                <li>Laravel</li>
                <li>Python</li>
            </ul>
        </article>
    </section>
</x-user-layout>