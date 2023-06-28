<div class="list-group"> 
    <a href="{{route('home')}}" class="list-group-item {{url()->current() == route('home') ? 'active' : ''}}">
        <i class="fas fa-home"></i><span class="p-2">一覧表示</span>
    </a>
    <a href="{{route('post.create')}}" class="list-group-item {{url()->current() == route('post.create') ? 'active' : ''}}">
        <i class="fas fa-pen-nib pr-2"></i><span class="p-2">新規投稿</span>
    </a>
    <a href="{{route('home.mypost')}}" class="list-group-item {{url()->current() == route('home.mypost') ? 'active' : ''}}"> 
       <i class="fas fa-user-edit pr-2"></i><span class="p-2">自分の投稿</span>
    </a>
    <a href="{{route('home.mycomment')}}" class="list-group-item {{url()->current() == route('home.mycomment') ? 'active':''}}">
        <i class="fas fa-user-edit pr-2"></i><span class="p-2">コメントした投稿</span>
    </a>
    @can('admin')
    <a href="{{route('profile.index')}}" class="list-group-item {{url()->current()==route('profile.index')?'active':''}}">
        <i class="fas fa-list pr-2"></i><span class="p-2">ユーザーアカウント</span>
    </a>
    @endcan
    <a href="{{route('profile.edit', auth()->user()->id)}}" 
    class="list-group-item {{url()->current()==route('profile.edit', auth()->user()->id)?'active':''}}">
        <i class="fas fa-id-badge pr-2"></i><span class="p-2">プロフィール編集</span>
    </a>
</div>