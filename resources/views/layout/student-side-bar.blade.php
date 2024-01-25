<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="{{ Route::is('studentDashboard') ? 'active' : '' }}"><a href="{{ route('studentDashboard') }}"><i class="icon-home"></i><span
                    class="sidebar-text">Dashboard</span></a></li>
        <li class=""><a href="{{ route('attendShow') }}"><i class="icon-note"></i><span
                    class="sidebar-text">Attendance</span></a></li>
        <li class="{{ Route::is('taskShow') || Route::is('daily-task-specific') || Route::is('taskInput') || Route::is('editTask') ? 'active' : '' }}"><a href="{{ route('taskShow') }}"><i class="icon-note"></i><span
                    class="sidebar-text">Daily Task</span></a></li>
        <li class="{{ Route::is('ojtRequirements') ? 'active' : '' }}"><a href="{{ route('ojtRequirements') }}"><i class="icon-docs"></i><span
                    class="sidebar-text">OJT Requirements</span></a></li>
    </ul>
</section>
