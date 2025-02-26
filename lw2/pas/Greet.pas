PROGRAM Greet(INPUT, OUTPUT);
VAR
  Query: STRING;
  Position: INTEGER;
USES 
  DOS;

BEGIN
  Query := GetEnv('QUERY_STRING');
  Position := Pos('name', Query);
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITE('Hello dear, ');
  
  IF Position <> 0
  THEN
    WRITE(Copy(Query, Position + 5, Length(Query) - Position))
  ELSE
    WRITE('Anonimous');
  WRITELN('!')
END.
