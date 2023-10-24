<x-user-layout>
    <x-slot:description>AYATAKAのプロフィールページです。</x-slot:description>
    <x-slot:keywords>AYATAKA,プロフィール</x-slot:keywords>
    <x-slot:title>AYATAKA | ABOUT</x-slot:title>
    <figure class="flex justify-center">
        <img src="{{asset("storage/blog/$image->name")}}" alt="プロフィール画像" width="400">
    </figure>
    <section>
        <x-section-title>自己紹介</x-section-title>
        <article class="prose m-auto lg:text-lg">
            {{$profile}}
        </article>
    </section>
    <section>
        <x-section-title>保有資格</x-section-title>
        <article class="prose m-auto lg:text-lg">
            <table>
                <thead>
                    <th>資格名</th>
                    <th>年月</th>
                    <th>結果</th>
                </thead>
                <tbody>
                    @foreach ($qualifications as $qualification)
                        <tr>
                            <td>{{$qualification->name}}</td>
                            <td>{{date("Y年m月",strtotime($qualification->status_date))}}</td>
                            <td>{{$qualification->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </section>
    <section>
        <x-section-title>スキル</x-section-title>
        <article class="prose m-auto">
            <table>
                <thead>
                    <th>スキル名</th>
                    <th>レベル</th>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr>
                            <td>{{$skill->name}}</td>
                            <td>
                                @for($i=1;$i<=$skill->level;$i++)
                                    <span class="text-primary">★</span>
                                @endfor
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="lg:text-lg">
                
            </ul>
        </article>
    </section>
</x-user-layout>