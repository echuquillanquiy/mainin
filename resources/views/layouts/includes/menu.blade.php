<aside class="aside-container">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
       <nav class="sidebar" data-sidebar-anyclick-close="">
          <!-- START sidebar nav-->
          <ul class="sidebar-nav">
             <!-- START user info-->
             <li class="has-user-block">
                <div class="collapse" id="user-block">
                   <div class="item user-block">
                      <!-- User picture-->
                      <div class="user-block-picture mt-1">
                         <div class="user-block-status"><img class="img-thumbnail rounded-circle" src="{{ asset('img/fotoprueba.png')}}" alt="Avatar" width="60" height="60">
                            <div class="circle bg-success circle-lg"></div>
                         </div>
                      </div><!-- Name and Job-->
                      <div class="user-block-info wrapper"><span class="user-block-name">{{ auth()->user()->username }}</span></div>
                   </div>
                </div>
             </li><!-- END user info-->
             <!-- Iterates over all sidebar items-->
             <li class="nav-heading mt-3"><span data-localize="sidebar.heading.HEADER">Panel Administrativo</span></li>

             <li class=" "><a href="/dashboard" title="Dashboard">
               <em class="icon-speedometer text-danger"></em>
               <span data-localize="sidebar.nav.WIDGETS">Dashboard</span>
               </a>
             </li>

             <li class=" "><a href="/" title="Usuarios">
               <em class="fas fa-user-plus text-success"></em>
               <span data-localize="sidebar.nav.WIDGETS">Usuarios</span>
               </a>
             </li>

             <li class=" "><a href="/puestos" title="Puestos">
               <em class="icon-layers text-primary"></em>
               <span data-localize="sidebar.nav.WIDGETS">Puestos</span>
               </a>
             </li>

             <li class=" "><a href="/clientes" title="Empresas Clientes">
               <em class="fas fa-building text-secondary"></em>
               <span data-localize="sidebar.nav.WIDGETS">Empresas Clientes</span>
               </a>
             </li>

             <li class=" "><a href="/categorias" title="Categorías">
               <em class="far fa-share-square text-warning"></em>
               <span data-localize="sidebar.nav.WIDGETS">Categorías</span>
               </a>
             </li>

             <li class=""><a href="/montos" title="Montos por puesto">
               <em class="fas fa-money-bill-alt text-green"></em>
               <span data-localize="sidebar.nav.WIDGETS">Montos por puesto</span>
               </a>
             </li>

             <li class=" "><a href="/areas" title="Áreas">
               <em class="fab fa-creative-commons-nd text-pink"></em>
               <span data-localize="sidebar.nav.WIDGETS">Áreas</span>
               </a>
             </li>

             <li class="nav-heading"><span data-localize="sidebar.heading.HEADER">Panel Gestion de Recursos</span></li>

             <li class="">
                <a href="/colaboradors" title="Single View">
                   <em class="fas fa-users text-purple"></em>
                   <span>Colaboradores</span>
                </a>
             </li>
          </ul><!-- END sidebar nav-->
       </nav>
    </div><!-- END Sidebar (left)-->
 </aside><!-- offsidebar-->