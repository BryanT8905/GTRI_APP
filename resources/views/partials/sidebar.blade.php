<div class=" sidebar float-start pt-5 pe-5">
            <ul style="list-style-type:none;">
            @can('isAdmin')
                <li><a href="{{ route('users.index') }}" class="text-black text-decoration-none">Users</a></li>
                <hr class="line">
              @endcan
                <li><a href="#" class="text-black text-decoration-none">Projects</a></li>
                <hr class="line">
                <li><a href="#" class="text-black text-decoration-none">Budget</a></li>
                <hr class="line">
                <li><a href="#" class="text-black text-decoration-none">Manage Assets</a></li>
                <hr class="line">
            </ul>	
</div>
