@extends('layouts.app')

@section('css-page')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Производственный календарь на 2018 год</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                   <table class="table table-responsive">
                       <tr>
                           <th colspan="7" style="text-align: center">Январь</th>
                           <th colspan="7" style="text-align: center">Февраль</th>
                           <th colspan="7" style="text-align: center">Март</th>
                       </tr>
                       <tr>
                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>
                       </tr>
                       <tr>
                           {{--явнарь--}}
                           <td style="color: red">1</td>
                           <td style="color: red">2</td>
                           <td style="color: red">3</td>
                           <td style="color: red">4</td>
                           <td style="color: red">5</td>
                           <td style="color: red">6</td>
                           <td style="color: red">7</td>
                           {{--февраль--}}
                           <td colspan="3"></td>
                           <td>1</td>
                           <td>2</td>
                           <td style="color: red">3</td>
                           <td style="color: red">4</td>
                           {{--март--}}
                           <td colspan="3"></td>
                           <td>1</td>
                           <td>2</td>
                           <td style="color: red">3</td>
                           <td style="color: red">4</td>
                       </tr>
                       <tr>
                           {{--явнарь--}}
                           <td style="color: red">8</td>
                           <td>9</td>
                           <td>10</td>
                           <td>11</td>
                           <td>12</td>
                           <td style="color: red">13</td>
                           <td style="color: red">14</td>
                           {{--февраль--}}
                           <td>5</td>
                           <td>6</td>
                           <td>7</td>
                           <td>8</td>
                           <td>9</td>
                           <td style="color: red">10</td>
                           <td style="color: red">11</td>
                           {{--март--}}
                           <td>5</td>
                           <td>6</td>
                           <td style="color: blue">7</td>
                           <td style="color: red">8</td>
                           <td style="color: red">9</td>
                           <td style="color: red">10</td>
                           <td style="color: red">11</td>
                       </tr>
                       <tr>
                           {{--явнарь--}}
                           <td>15</td>
                           <td>16</td>
                           <td>17</td>
                           <td>18</td>
                           <td>19</td>
                           <td style="color: red">20</td>
                           <td style="color: red">21</td>
                           {{--февраль--}}
                           <td>12</td>
                           <td>13</td>
                           <td>14</td>
                           <td>15</td>
                           <td>16</td>
                           <td style="color: red">17</td>
                           <td style="color: red">18</td>
                           {{--март--}}
                           <td>12</td>
                           <td>13</td>
                           <td>14</td>
                           <td>15</td>
                           <td>16</td>
                           <td style="color: red">17</td>
                           <td style="color: red">18</td>
                       </tr>
                       <tr>
                           {{--явнарь--}}
                           <td>22</td>
                           <td>23</td>
                           <td>24</td>
                           <td>25</td>
                           <td>26</td>
                           <td style="color: red">27</td>
                           <td style="color: red">28</td>
                           {{--февраль--}}
                           <td>19</td>
                           <td>20</td>
                           <td>21</td>
                           <td style="color: blue">22</td>
                           <td style="color: red">23</td>
                           <td style="color: red">24</td>
                           <td style="color: red">25</td>
                           {{--март--}}
                           <td>19</td>
                           <td>20</td>
                           <td>21</td>
                           <td>22</td>
                           <td>23</td>
                           <td style="color: red">24</td>
                           <td style="color: red">25</td>
                       </tr>
                       <tr>
                           {{--явнарь--}}
                           <td>29</td>
                           <td>30</td>
                           <td>31</td>
                           <td colspan="4"></td>
                           {{--февраль--}}
                           <td>26</td>
                           <td>27</td>
                           <td>28</td>
                           <td colspan="4"></td>
                           {{--март--}}
                           <td>26</td>
                           <td>27</td>
                           <td>28</td>
                           <td>29</td>
                           <td>30</td>
                           <td style="color: red">31</td>
                           <td></td>
                       </tr>
                       <tr>
                           <th colspan="7" style="text-align: center">Апрель</th>
                           <th colspan="7" style="text-align: center">Май</th>
                           <th colspan="7" style="text-align: center">Июнь</th>
                       </tr>
                       <tr>
                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>
                       </tr>
                       <tr>
                           {{--апрель--}}
                           <td colspan="6"></td>
                           <td style="color: red">1</td>
                           {{--май--}}
                           <td colspan="1"></td>
                           <td style="color: red">1</td>
                           <td style="color: red">2</td>
                           <td>3</td>
                           <td>4</td>
                           <td style="color: red">5</td>
                           <td style="color: red">6</td>
                           {{--июнь--}}
                           <td colspan="4"></td>
                           <td>1</td>
                           <td style="color: red">2</td>
                           <td style="color: red">3</td>
                       </tr>
                       <tr>
                           {{--апрель--}}
                           <td>2</td>
                           <td>3</td>
                           <td>4</td>
                           <td>5</td>
                           <td>6</td>
                           <td style="color: red">7</td>
                           <td style="color: red">8</td>
                           {{--май--}}
                           <td>7</td>
                           <td style="color: blue">8</td>
                           <td style="color: red">9</td>
                           <td>10</td>
                           <td>11</td>
                           <td style="color: red">12</td>
                           <td style="color: red">13</td>
                           {{--июнь--}}
                           <td>4</td>
                           <td>5</td>
                           <td>6</td>
                           <td>7</td>
                           <td>8</td>
                           <td style="color: blue">9</td>
                           <td style="color: red">10</td>
                       </tr>
                       <tr>
                           {{--апрель--}}
                           <td>9</td>
                           <td>10</td>
                           <td>11</td>
                           <td>12</td>
                           <td>13</td>
                           <td style="color: red">14</td>
                           <td style="color: red">15</td>
                           {{--май--}}
                           <td>14</td>
                           <td>15</td>
                           <td>16</td>
                           <td>17</td>
                           <td>18</td>
                           <td style="color: red">19</td>
                           <td style="color: red">20</td>
                           {{--июнь--}}
                           <td style="color: red">11</td>
                           <td style="color: red">12</td>
                           <td>13</td>
                           <td>14</td>
                           <td>15</td>
                           <td style="color: red">16</td>
                           <td style="color: red">17</td>
                       </tr>
                       <tr>
                           {{--апрель--}}
                           <td>16</td>
                           <td>17</td>
                           <td>18</td>
                           <td>19</td>
                           <td>20</td>
                           <td style="color: red">21</td>
                           <td style="color: red">22</td>
                           {{--май--}}
                           <td>21</td>
                           <td>22</td>
                           <td>23</td>
                           <td>24</td>
                           <td>25</td>
                           <td style="color: red">26</td>
                           <td style="color: red">27</td>
                           {{--июнь--}}
                           <td>18</td>
                           <td>19</td>
                           <td>20</td>
                           <td>21</td>
                           <td>22</td>
                           <td style="color: red">23</td>
                           <td style="color: red">24</td>
                       </tr>
                       <tr>
                           {{--апрель--}}
                           <td>23</td>
                           <td>24</td>
                           <td>25</td>
                           <td>26</td>
                           <td>27</td>
                           <td style="color: blue">28</td>
                           <td style="color: red">29</td>
                           {{--май--}}
                           <td>28</td>
                           <td>29</td>
                           <td>30</td>
                           <td>31</td>
                           <td colspan="3"></tdc>
                           {{--июнь--}}
                           <td>25</td>
                           <td>26</td>
                           <td>27</td>
                           <td>28</td>
                           <td>29</td>
                           <td style="color: red">30</td>
                           <td colspan="1"></td>
                       </tr>
                       <tr>
                           {{--апрель--}}
                           <td style="color: red">30</td>
                           <td colspan="20"></td>
                           {{--май--}}
                           {{--июнь--}}
                       </tr>
                       <tr>
                           <th colspan="7" style="text-align: center">Июль</th>
                           <th colspan="7" style="text-align: center">Август</th>
                           <th colspan="7" style="text-align: center">Сентябрь</th>
                       </tr>
                       <tr>
                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>
                       </tr>
                       <tr>
                           {{--июль--}}
                           <td colspan="6"></td>
                           <td style="color: red">1</td>
                           {{--август--}}
                           <td colspan="2"></td>
                           <td>1</td>
                           <td>2</td>
                           <td>3</td>
                           <td style="color: red">4</td>
                           <td style="color: red">5</td>
                           {{--сентябрь--}}
                           <td colspan="5"></td>
                           <td style="color: red">1</td>
                           <td style="color: red">2</td>
                       </tr>
                       <tr>
                           {{--июль--}}
                           <td>2</td>
                           <td>3</td>
                           <td>4</td>
                           <td>5</td>
                           <td>6</td>
                           <td style="color: red">7</td>
                           <td style="color: red">8</td>
                           {{--август--}}
                           <td>6</td>
                           <td>7</td>
                           <td>8</td>
                           <td>9</td>
                           <td>10</td>
                           <td style="color: red">11</td>
                           <td style="color: red">12</td>
                           {{--сентябрь--}}
                           <td>3</td>
                           <td>4</td>
                           <td>5</td>
                           <td>6</td>
                           <td>7</td>
                           <td style="color: red">8</td>
                           <td style="color: red">9</td>
                       </tr>
                       <tr>
                           {{--июль--}}
                           <td>9</td>
                           <td>10</td>
                           <td>11</td>
                           <td>12</td>
                           <td>13</td>
                           <td style="color: red">14</td>
                           <td style="color: red">15</td>
                           {{--август--}}
                           <td>13</td>
                           <td>14</td>
                           <td>15</td>
                           <td>16</td>
                           <td>17</td>
                           <td style="color: red">18</td>
                           <td style="color: red">19</td>
                           {{--сентябрь--}}
                           <td>10</td>
                           <td>11</td>
                           <td>12</td>
                           <td>13</td>
                           <td>14</td>
                           <td style="color: red">15</td>
                           <td style="color: red">16</td>
                       </tr>
                       <tr>
                           {{--июль--}}
                           <td>16</td>
                           <td>17</td>
                           <td>18</td>
                           <td>19</td>
                           <td>20</td>
                           <td style="color: red">21</td>
                           <td style="color: red">22</td>
                           {{--август--}}
                           <td>20</td>
                           <td>21</td>
                           <td>22</td>
                           <td>23</td>
                           <td>24</td>
                           <td style="color: red">25</td>
                           <td style="color: red">26</td>
                           {{--сентябрь--}}
                           <td>17</td>
                           <td>18</td>
                           <td>19</td>
                           <td>20</td>
                           <td>21</td>
                           <td style="color: red">22</td>
                           <td style="color: red">23</td>
                       </tr>
                       <tr>
                           {{--июль--}}
                           <td>23</td>
                           <td>24</td>
                           <td>25</td>
                           <td>26</td>
                           <td>27</td>
                           <td style="color: red">28</td>
                           <td style="color: red">29</td>
                           {{--август--}}
                           <td>27</td>
                           <td>28</td>
                           <td>29</td>
                           <td>30</td>
                           <td>31</td>
                           <td colspan="2"></td>
                           {{--сентябрь--}}
                           <td>24</td>
                           <td>25</td>
                           <td>26</td>
                           <td>27</td>
                           <td>28</td>
                           <td style="color: red">29</td>
                           <td style="color: red">30</td>
                       </tr>
                       <tr>
                           {{--июль--}}
                           <td>30</td>
                           <td>31</td>
                           <td colspan="19"></td>
                           {{--август--}}
                           {{--сентябрь--}}
                       </tr>
                       <tr>
                           <th colspan="7" style="text-align: center">Октябрь</th>
                           <th colspan="7" style="text-align: center">Ноябрь</th>
                           <th colspan="7" style="text-align: center">Декабрь</th>
                       </tr>
                       <tr>
                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>

                           <td>Пн</td>
                           <td>Вт</td>
                           <td>Ср</td>
                           <td>Чт</td>
                           <td>Пт</td>
                           <td>Сб</td>
                           <td>Вс</td>
                       </tr>
                       <tr>
                           {{--октябрь--}}
                           <td>1</td>
                           <td>2</td>
                           <td>3</td>
                           <td>4</td>
                           <td>5</td>
                           <td style="color: red">6</td>
                           <td style="color: red">7</td>
                           {{--ноябрь--}}
                           <td colspan="3"></td>
                           <td>1</td>
                           <td>2</td>
                           <td style="color: red">3</td>
                           <td style="color: red">4</td>
                           {{--декабрь--}}
                           <td colspan="5"></td>
                           <td style="color: red">1</td>
                           <td style="color: red">2</td>
                       </tr>
                       <tr>
                           {{--октябрь--}}
                           <td>8</td>
                           <td>9</td>
                           <td>10</td>
                           <td>11</td>
                           <td>12</td>
                           <td style="color: red">13</td>
                           <td style="color: red">14</td>
                           {{--ноябрь--}}
                           <td style="color: red">5</td>
                           <td>6</td>
                           <td>7</td>
                           <td>8</td>
                           <td>9</td>
                           <td style="color: red">10</td>
                           <td style="color: red">11</td>
                           {{--декабрь--}}
                           <td>3</td>
                           <td>4</td>
                           <td>5</td>
                           <td>6</td>
                           <td>7</td>
                           <td style="color: red">8</td>
                           <td style="color: red">9</td>
                       </tr>
                       <tr>
                           {{--октябрь--}}
                           <td>15</td>
                           <td>16</td>
                           <td>17</td>
                           <td>18</td>
                           <td>19</td>
                           <td style="color: red">20</td>
                           <td style="color: red">21</td>
                           {{--ноябрь--}}
                           <td>12</td>
                           <td>13</td>
                           <td>14</td>
                           <td>15</td>
                           <td>16</td>
                           <td style="color: red">17</td>
                           <td style="color: red">18</td>
                           {{--декабрь--}}
                           <td>10</td>
                           <td>11</td>
                           <td>12</td>
                           <td>13</td>
                           <td>14</td>
                           <td style="color: red">15</td>
                           <td style="color: red">16</td>
                       </tr>
                       <tr>
                           {{--октябрь--}}
                           <td>22</td>
                           <td>23</td>
                           <td>24</td>
                           <td>25</td>
                           <td>265</td>
                           <td style="color: red">27</td>
                           <td style="color: red">28</td>
                           {{--ноябрь--}}
                           <td>19</td>
                           <td>20</td>
                           <td>21</td>
                           <td>22</td>
                           <td>23</td>
                           <td style="color: red">24</td>
                           <td style="color: red">25</td>
                           {{--декабрь--}}
                           <td>17</td>
                           <td>18</td>
                           <td>19</td>
                           <td>20</td>
                           <td>21</td>
                           <td style="color: red">22</td>
                           <td style="color: red">23</td>
                       </tr>
                       <tr>
                           {{--октябрь--}}
                           <td>29</td>
                           <td>30</td>
                           <td>31</td>
                           <td colspan="4"></td>
                           {{--ноябрь--}}
                           <td>26</td>
                           <td>27</td>
                           <td>28</td>
                           <td>29</td>
                           <td>30</td>
                           <td colspan="2"></td>
                           {{--декабрь--}}
                           <td>24</td>
                           <td>25</td>
                           <td>26</td>
                           <td>27</td>
                           <td>28</td>
                           <td style="color: blue">29</td>
                           <td style="color: red">30</td>
                       </tr>
                       <tr>
                           {{--октябрь--}}
                           {{--ноябрь--}}
                           {{--декабрь--}}
                           <td colspan="14"></td>
                           <td style="color: red">31</td>
                           <td colspan="6"></td>
                       </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')

@endsection