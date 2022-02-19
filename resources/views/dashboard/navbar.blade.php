<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://i.ibb.co/HpJN8FL/EV.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            PM GROUP | Mr Admin
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{  'dashboard' == request()->path() ? 'active open' : '' }} @if(Route::currentRouteName() == 'stat.index') active open @endif">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/dashboard">
                                    <span class="sub-item">Les Statistiques</span>
                                </a>
                            </li>
                            <li class="@if(Route::currentRouteName() == 'stat.index') active open @endif">
                                <a href="/">
                                    <span class="sub-item">Le Site</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
                {{  'admin.add_auto' == request()->path() ? 'active open' : '' }}
                @if(Route::currentRouteName() == 'admin.list_auto') active open @endif
                @if(Route::currentRouteName() == 'admin.add_auto') active open @endif
                @if(Route::currentRouteName() == 'edit_auto') active open @endif
                ">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Une Facture</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{  'add_auto' == request()->path() ? 'active open' : '' }}">
                                <a href="/add_auto">
                                    <span class="sub-item">Ajouter Une Facture</span>
                                </a>
                            </li>
                            <li class="@if(Route::currentRouteName() == 'admin.list_auto') active open @endif @if(Route::currentRouteName() == 'edit_auto') active open @endif ">
                                <a href="/list_auto">
                                    <span class="sub-item">Listes des Factures</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="mx-4 mt-2">
                    <a href="/search" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-smile"></i> </span>Factures SCI </a>
                </li>
            </ul>
        </div>
    </div>
</div>


