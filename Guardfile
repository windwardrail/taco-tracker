guard 'coffeescript', :input => 'public/coffeescripts', :output => 'public/javascripts'

guard 'compass' do
  watch(%r{^sass/(.*)\.s[ac]ss})
end


guard 'livereload' do

  watch(%r{app/views/.+\.(blade.php|php)$})
  watch(%r{app/controllers/.+\.php$})
  watch(%r{public/stylesheets/.+\.css})

  watch(%r{public/javascripts/.+\.(js|html)})
  watch(%r{public/javascripts/querypage/\w+/.+\.js})
  watch(%r{public/javascripts/specs/querypage/\w+/.+\.js})

end
