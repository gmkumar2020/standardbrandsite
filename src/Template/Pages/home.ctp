        <div class="row">
          <section class='col-xs-12 col-sm-6 col-md-6'>
            <section>
              <h2>100% pure agave tequila with a revolutionary spirit</h2>
              <p>Hornitos® is a premium tequila born on Mexican Independence Day in 1950.  A 100% pure agave tequila, Hornitos continues to push boundaries for the betterment of its tequila and the tequila industry.  
</p>
               
 
 

<p>After pushing changes, you'll need to manually trigger a build if you did not setup a webhook as described above.</p>

                  <h3>Expanding on sample app</h3>
                  <p>
                  In order to access the original CakePHP application, you must restore the original
                  src/Template/Layout/default.ctp.default and src/Template/Pages/home.ctp.default files.
                  </p>
                  <p>
                  It will also be necessary to update your application to talk to your database back-end.  The <code>config/app.php</code> file used by CakePHP was set up in such a way that it will accept environment variables for your connection information that you pass to it.
                  Once an administrator has created a MySQL database service for you to connect with you can add the following environment variables to your deploymentConfig to ensure all your frontend pods have access to these environment variables.
                  Note: the cakephp-mysql.json template creates the DB service and environment variables for you.

 
                  </p>
                  <p>
                  Note: If the database service is created in the same project as the frontend pod,
                  the *_SERVICE_HOST and *_SERVICE_PORT environment variables will be automatically
                  created.
                  </p>
          

            </section>

          </section>
          <section class="col-xs-12 col-sm-6 col-md-6">

                <h2>Managing your application</h2>

                <p>Documentation on how to manage your application from the Web Console or Command Line is available at the <a href="http://docs.okd.io/latest/dev_guide/overview.html">Developer Guide</a>.</p>

                <h3>Web Console</h3>
                <p>You can use the Web Console to view the state of your application components and launch new builds.</p>

                <h3>Command Line</h3>
                <p>With the <a href="http://docs.okd.io/latest/cli_reference/overview.html">OpenShift command line interface</a> (CLI), you can create applications and manage projects from a terminal.</p>

                <h2>Development Resources</h2>
                  <ul>
                    <li><a href="http://docs.okd.io/latest/welcome/index.html">OpenShift Documentation</a></li>
                    <li><a href="https://github.com/openshift/origin">Openshift Origin GitHub</a></li>
                    <li><a href="https://github.com/openshift/source-to-image">Source To Image GitHub</a></li>
                    <li><a href="http://docs.okd.io/latest/using_images/s2i_images/php.html">Getting Started with PHP on OpenShift</a></li>
                    <li><a href="http://stackoverflow.com/questions/tagged/openshift">Stack Overflow questions for OpenShift</a></li>
                    <li><a href="http://git-scm.com/documentation">Git documentation</a></li>
                  </ul>

                <h2>Request information</h2>
                <p>Page view count:
               <?php
                    use Cake\Datasource\ConnectionManager;

                    $hasDB=1;
                    $tableExisted=0;
                    try {
                      $connection = ConnectionManager::get('default');
                    } catch(Exception $e) {
                      $hasDB=0;
                    }
                    if ($hasDB) {
                        try {
                          $connection->execute('create table view_counter (c integer)');
                        } catch (Exception $e) {
                        	$tableExisted=1;
                        }
                        try {
                            if ($tableExisted==0) {
                            	$connection->execute('insert into view_counter values(1)');
                            } else {
                                $connection->execute('update view_counter set c=c+1');
                            }
                            $result=$connection->execute('select * from view_counter')->fetch('assoc');;
                        } catch (Exception $e) {
                            $hasDB=0;
                        }
                    }
                ?>
                <?php if ($hasDB==1) : ?>
                   <span class="code" id="count-value"><?php print_r($result['c']); ?></span>
                   </p>
                <?php else : ?>
                   <span class="code" id="count-value">No database configured</span>
                   </p>
                <?php endif; ?>

          </section>
        </div>