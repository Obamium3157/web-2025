PROGRAM SarahRevere(INPUT, OUTPUT);
VAR
  Query: STRING;

USES 
  DOS;

BEGIN
  Query := GetEnv('QUERY_STRING');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF Query = 'lanterns=1'
  THEN
    WRITELN('The British are coming by land')
  ELSE
    IF Query = 'lanterns=2'
    THEN
      WRITELN('The British are coming by sea')
    ELSE
      WRITELN('Sarah didn''t say');  
END.
