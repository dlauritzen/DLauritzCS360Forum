set :application, "DLauritz CS 360 Forum"
set :domain,      "forum.dallinlauritzen.com"
set :deploy_to,   "/home/dallinl/#{domain}"

set :user, "dallinl"
ssh_options[:forward_agent] = true
set :php_bin, "/usr/local/bin/php-5.3"

set :repository,  "git@github.com:dlauritzen/DLauritzCS360Forum.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, `subversion` or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

set :shared_files, ["app/config/parameters.ini"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]
set :update_vendors, true

set :use_sudo, false
set  :keep_releases,  3
